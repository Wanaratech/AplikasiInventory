<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now();
        $today = $now->toDateString();

        $accounts = [
            // id | code | nama_code | category | normal_balance
            [20, '1052', 'Kas dan Bank', 'Debit'],
            [21, '1204', 'Piutang Usaha', 'Debit'],
            [22, '1302', 'Persediaan', 'Debit'],
            [23, '1431', 'Aset Lancar Lainnya', 'Debit'],
            [24, '1502', 'Aset Tetap', 'Debit'],
            [25, '1602', 'Penyusutan & Amortisasi', 'Debit'],
            [26, '1701', 'Aset Lainnya', 'Debit'],
            [27, '1801', 'Kerugian Aset', 'Debit'],
            [28, '2004', 'Hutang Usaha', 'Kredit'],
            [29, '2101', 'Kartu Kredit', 'Kredit'],
            [30, '2291', 'Kewajiban Lancar Lainnya', 'Kredit'],
            [31, '2301', 'Kewajiban Jangka Panjang', 'Kredit'],
            [32, '3091', 'Modal', 'Kredit'],
            [33, '4007', 'Pendapatan', 'Kredit'],
            [34, '7902', 'Pendapatan Lainnya', 'Kredit'],
            [35, '5006', 'Harga Pokok Penjualan', 'Debit'],
            [36, '6902', 'Beban Operasional', 'Debit'],
            [37, '6904', 'Beban Aset', 'Debit'],
            [38, '8903', 'Beban Lainnya', 'Debit'],
        ];

        // Memasukkan data ke database
        foreach ($accounts as $account) {
            DB::table('tb_chart_akun')->insert([ // Pastikan nama tabel ini benar
                'id_tipeakun' => $account[0],
                'kode' => $account[1],
                'nama' => $account[2],
                'keterangan' => $account[3], // Menggunakan saldo normal sebagai keterangan
                'saldo_awal' => 0,
                'tanggal_saldo_awal' => $today,
                'saldo' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
    
}
