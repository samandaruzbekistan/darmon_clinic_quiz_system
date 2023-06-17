<?php

namespace App\Http\Controllers;

//use BaconQrCode\Encoder\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    public function generatePDF($id)
    {
//        $logo = base64_encode(file('img/LOGO01.png'));

        $db = DB::table('vacant_results')
            ->where('id', $id)
            ->first();
        $qrcode = base64_encode(QrCode::size(200)->errorCorrection('H')->generate('https://darmonklinika.uz/generate-pdf/'.$db->id));
        $data = [
            'fullname' => $db->fullname,
            'created_at' => $db->created_at,
            'id' => $db->id,
            'prosent' => $db->prosent,
            'sb1' => $db->sb1,
            'sb2' => $db->sb2,
            'sb3' => $db->sb3,
            'sb4' => $db->sb4,
            'sb_name1' => $db->sb_name1,
            'sb_name2' => $db->sb_name2,
            'sb_name3' => $db->sb_name3,
            'sb_name4' => $db->sb_name4,
            'results' => $db->results,
            'qr' => $qrcode,
        ];

//        $data = json_decode(json_encode($data), true);
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download($data['fullname'].".pdf");
    }
}
