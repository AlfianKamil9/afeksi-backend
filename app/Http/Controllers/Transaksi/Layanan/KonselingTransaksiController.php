<?php

namespace App\Http\Controllers\Transaksi\Layanan;

use Carbon\Carbon;
use App\Models\bank;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use App\Models\PembayaranLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\CstoreService;
use App\Services\Midtrans\PembayaranEvent\EwalletService;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;

class KonselingTransaksiController extends Controller
{
    public function showFormDataDiri($ref_transaction_layanan)
    {
        $data = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->where('status', 'UNPAID');
        return view('pages.ProfessionalKonseling.data-diri', compact('data'));
    }

    public function submitDataDiri(Request $request, $ref_transaction_layanan)
    {
        $request->validate([
            'namaLengkap' => 'required',
            'jenisKelamin' => 'required',
            'email' => 'required',
            'no_whatsapp' => 'required',
            'umur' => 'required',
            'tgl_konsultasi' => 'required',
            'jam_konsultasi' => 'required',
            'detail_masalah' => 'required'
        ]);
        $id = PembayaranLayanan::where("ref_transaction_layanan", $ref_transaction_layanan)->first();
        date_default_timezone_set('Asia/Jakarta');
        $tglSekarang = date_create()->format("d");
        $blnSekarang = date_create()->format("m");
        $thnSekarang = date_create()->format("Y");
        $tglKonsultasi = date_create($request->tgl_konsultasi)->format("d");
        $blnKonsultasi = date_create($request->tgl_konsultasi)->format("m");
        $thnKonsultasi = date_create($request->tgl_konsultasi)->format("Y");
        // dd($tglSekarang);
        if ($tglSekarang > $tglKonsultasi && $blnSekarang == $blnKonsultasi && ($thnSekarang == $thnKonsultasi || $thnSekarang > $thnKonsultasi)) {
            return back()->with('error', 'Tanggal konsultasi tidak boleh sebelum tanggal sekarang!');
        } elseif ($tglSekarang < $tglKonsultasi && $blnSekarang > $blnKonsultasi && ($thnSekarang == $thnKonsultasi || $thnSekarang > $thnKonsultasi)) {
            return back()->with('error', 'Tanggal konsultasi tidak boleh sebelum tanggal sekarang!');
        } elseif ($tglSekarang == $tglKonsultasi && $blnSekarang > $blnKonsultasi && ($thnSekarang == $thnKonsultasi || $thnSekarang > $thnKonsultasi)) {
            return back()->with('error', 'Tanggal konsultasi tidak boleh sebelum tanggal sekarang!');
        }
        DetailPembayaran::create([
            'pembayaran_layanan_id' => $id->id,
            'tgl_konsultasi' => $request->tgl_konsultasi,
            'jam_konsultasi' => $request->jam_konsultasi,
            'detail_masalah' => $request->detail_masalah,
        ]);
        return redirect('/slug-konseling-yg-dipilih/' . $ref_transaction_layanan . '/pembayaran');
    }

    public function showPembayaran($ref_transaction_layanan)
    {
        $data = PembayaranLayanan::with('voucher', 'psikolog', 'detail_pembayarans', 'paket_profesional_conselings')
            ->where('ref_transaction_layanan', $ref_transaction_layanan)->first();
        // dd($data);
        return view('pages.ProfessionalKonseling.pembayaran', compact('data'));
    }

    public function checkoutProfessionalKonseling(Request $request, $ref_transaction_layanan)
    {
        $id = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
        if (isset($request->btnBatalVoucher)) {
            session()->forget('apply');
            // $now = Carbon::now();
            // $kode = Voucher::where('kode', $request->input_code)->where('expired_date', '>=', $now)->first();
            // $kode->update([
            //     'stok_voucher' => $kode->stok_voucher + 1
            // ]);
            return back();
        } else if (isset($request->btnApplyVoucher)) {
            if (isset($request->input_code)) {
                $now = Carbon::now();
                $kode = Voucher::where('kode', $request->input_code)->where('expired_date', '>=', $now)->first();
                if (!$kode) {
                    return back()->with('error', 'Code Voucher is Invalid');
                }
                session()->put('apply', [
                    'kode' => $kode->kode,
                    'diskon' => $kode->jumlah_diskon,
                    'pesan' => "Berhasil Menerapkan Voucher",
                    'bank' => $request->bank
                ]);
                return back();
            }
            return back()->with('error', 'Code Voucher is Null');
        }
        $now = Carbon::now();
        $kode = Voucher::where('kode', $request->input_code)->where('expired_date', '>=', $now)->first();
        // dd($kode);
        if ($kode == null) {
        } elseif ($kode->stok_voucher == 0) {
            return back()->with('error', 'Code Voucher is Empty');
        } else {
            $kode->update([
                'stok_voucher' => $kode->stok_voucher - 1
            ]);
            $id->update([
                'voucher_id' => $kode->id
            ]);
        }
        $validate = Validator::make($request->all(), [
            "bank" => 'required',
            "ref" => 'required'
        ]);
        if ($validate->fails()) {
            return back()->with('message', 'Bank Harus Diisi');
        }
        $bank = bank::where('id', $request->bank)->pluck('bank')->first();
        $this->klasifikasiPaymentMethod($bank, $ref_transaction_layanan);
        if ($bank == 'bni' || $bank == 'bri' || $bank == 'bca' || $bank == 'cimb' || $bank == 'permata') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id->id)->first();
            // dd($getData);
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va = '<h6 style="text-transform:uppercase;">' . $bank . ' VA = ' . $getData->kode_bayar_1 . '</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData2->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";

            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/' . $ref_transaction_layanan . '/notification-konseling/success');

        } else if ($bank == 'mandiri') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id->id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<h6 style="text-transform:uppercase;">' . $bank . ' Bill Key = ' . $getData->kode_bayar_1 . '</h6>
                    <h6 style="text-transform:uppercase;">' . $bank . ' Bill Code = ' . $getData->kode_bayar_2 . '</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData2->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";

            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/' . $ref_transaction_layanan . '/notification-konseling/success');

        } else if ($bank == 'indomaret') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id->id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<h6 style="text-transform:uppercase;">' . $bank . ' Kode Pembayaran = ' . $getData->kode_bayar_1 . '</h6>
                    <h6 style="text-transform:uppercase;">Kode Merchant = ' . $getData->kode_bayar_2 . '</h6>
                    ';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData2->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";

            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/' . $ref_transaction_layanan . '/notification-konseling/success');

        } else if ($bank == 'alfamart') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id->id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<h6 style="text-transform:uppercase;">' . $bank . ' Kode Pembayaran = ' . $getData->kode_bayar_1 . '</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData2->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";

            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/' . $ref_transaction_layanan . '/notification-konseling/success');

        } else if ($bank == 'shopeepay') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id->id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<center><a style="text-transform:uppercase;" href="' . $getData->kode_bayar_1 . '" class="btn btn-primary">Bayar Sekarang</a></center>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData2->updated_at->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->addMinutes(15)->format('H:i') . "</strong>";
            
            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/' . $ref_transaction_layanan . '/notification-konseling/success');

        } else if ($bank == 'gopay') {
            // <img src="'.$getData->kode_bayar_2.'" width="75px" alt="Kode_Pembayaran">
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id->id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<center>
                        <a style="text-transform:uppercase;" href="' . $getData->kode_bayar_1 . '"  class="btn btn-primary">Bayar Sekarang</a>
                    </center>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData2->updated_at->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->addMinutes(15)->format('H:i') . "</strong>";
            
            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/' . $ref_transaction_layanan . '/notification-konseling/success');
        }
    }

    public function klasifikasiPaymentMethod($bank, $ref)
    {
        $tabelPembayaran = PembayaranLayanan::where('ref_transaction_layanan', $ref)->pluck('id')->first();

        // -----------------BNI, BRI, BCA, CIMB----------------------- //
        if ($bank == 'bni' || $bank == 'bri' || $bank == 'bca' || $bank == 'cimb') {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans', 'voucher')->where('ref_transaction_layanan', $ref)->first();
            // dd($data);
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }
            $result = new TransferBankService();
            $res = $result->bank($bank, $data);
            // dd($res);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["va_numbers"][0]["va_number"]
            ]);

            $responData = [
                "message" =>  $res["status_message"],
                "bank" => $res["va_numbers"][0]["bank"],
                "va_transfer" => $res["va_numbers"][0]["va_number"]
            ];
            return $responData;
        }

        // -----------------MANDIRI----------------------- //
        else if ($bank == "mandiri") {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
            // dd($data->voucher);
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }

            $result = new TransferBankService();
            $res = $result->mandiri($bank, $data);
            // dd($res);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["bill_key"],
                "kode_bayar_2" => $res["biller_code"]
            ]);
            $expired = Carbon::now()->addDay(1)->format('Y-m-d');
            $responData = [
                "message" =>  $res["status_message"],
                "bill_key" =>  $res["bill_key"],
                "biller_code" => $res["biller_code"]
            ];
            return $responData;
        }

        // -----------------PERMATA----------------------- //
        else if ($bank == "permata") {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }

            $result = new TransferBankService();
            $res = $result->permata($bank, $data);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["permata_va_number"],
            ]);
            $responData = [
                "message" => $res["status_message"],
                "bank" => $bank,
                "va_transfer" =>  $res["permata_va_number"]
            ];
            return $responData;
        }

        // -----------------INDOMARET----------------------- //
        else if ($bank == "indomaret") {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }
            $result = new CstoreService();
            $res = $result->indomaret($bank, $data);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
            }
            // insert db
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["payment_code"],
                "kode_bayar_2" => $res["merchant_id"],
            ]);
            $responData = [
                "message" =>  $res["status_message"],
                "store" => $res["store"],
                "payment_code" => $res["payment_code"]
            ];
            return $responData;
        }

        // -----------------ALFAMART----------------------- //
        else if ($bank == "alfamart") {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }
            $result = new CstoreService();
            $res = $result->alfamart($bank, $data);
            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
            }
            // insert db
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["payment_code"],
            ]);
            $responData = [
                "message" =>  $res["status_message"],
                "store" => $res["store"],
                "payment_code" => $res["payment_code"]
            ];
            return $responData;
        } else if ($bank == "gopay") {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }

            $result = new EwalletService();
            $res = $result->gopay($bank, $data);
            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
            }
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["actions"][1]['url'],
                "kode_bayar_2" => $res["actions"][0]['url'],
            ]);
            $responData = [
                "message" =>  $res["status_message"],
            ];
            return $responData;
        }
        // ----------------------------SHOPPE-PAY---------------------
        else if ($bank == "shopeepay") {
            $data = PembayaranLayanan::with('user', 'paket_profesional_conselings', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
            if ($data->voucher == null) {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            } else {
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_profesional_conselings->harga - $data->voucher->jumlah_diskon,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
            }

            $result = new EwalletService();
            $res = $result->shopeePay($bank, $data);
            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
            }
            // insert db
            PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaksi" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                "kode_bayar_1" => $res["actions"][0]['url'],
            ]);
            $responData = [
                "message" =>  $res["status_message"],
            ];
            return $responData;
        }
    }
}
