<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Anggaran;
use App\Models\Dataanggaran;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_email' => 'administrator@pmb-unidayan.com',
            'login_telepon' => '085944923123',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword2 = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Fathur Walkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword2,
            'login_email' => 'fathurwalkers@laravel.com',
            'login_telepon' => '084842848242',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------
        // ---------------------------------------------------------------------------

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Syarah',
            'login_username' => 'syarah',
            'login_password' => $hashPassword,
            'login_email' => 'syaral@flask.com',
            'login_telepon' => '08554929239',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------
        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('12345', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Example Users',
            'login_username' => 'example',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1234', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // User Ketiga
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Fathur Walkers',
            'login_username' => 'fathur',
            'login_password' => $hashPassword,
            'login_email' => 'fathurwalkers@gmail.com',
            'login_telepon' => '08492929191',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Anggaran::create([
            'anggaran_nama' => 'KAS RUKUN KEMATIAN DAN SOSIAL',
            'anggaran_tipe' => 'PENERIMAAN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Anggaran::create([
            'anggaran_nama' => 'KAS RUKUN KEMATIAN DAN SOSIAL',
            'anggaran_tipe' => 'PENGELUARAN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Anggaran::create([
            'anggaran_nama' => 'KAS PEMBANGUNAN LINGKUNGAN TAHUN 2021',
            'anggaran_tipe' => 'PENERIMAAN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Anggaran::create([
            'anggaran_nama' => 'KAS PEMBANGUNAN LINGKUNGAN TAHUN 2021',
            'anggaran_tipe' => 'PENGELUARAN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Anggaran::create([
            'anggaran_nama' => 'KAS HUT KEMERDEKAAN RI TAHUN 2021',
            'anggaran_tipe' => 'PENERIMAAN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Anggaran::create([
            'anggaran_nama' => 'KAS HUT KEMERDEKAAN RI TAHUN 2021',
            'anggaran_tipe' => 'PENGELUARAN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $anggaran = Anggaran::all();

        foreach ($anggaran as $ang) {
            $deskripsi = [
                'Saldo kas awal',
                'Iuran bulan Januari',
                'Iuran bulan Februari',
                'Iuran bulan Maret',
                'Iuran bulan April',
                'Iuran bulan Mei',
                'Iuran bulan Juni',
                'Iuran bulan Juli',
                'Iuran bulan Agustus',
                'Iuran bulan September',
                'Iuran bulan Oktober',
                'Iuran bulan November',
                'Iuran bulan Desember',
                'Bantuan Sosial Warga yg Sakit',
                'Bantuan Sosial Warga Kurang Mampu'
            ];
            foreach ($deskripsi as $desk) {
                $anggaran_tanggal = $faker->dateTimeBetween('-1 years');
                dd($anggaran_tanggal);
                switch ($ang->anggaran_tipe) {
                    case 'PENERIMAAN':
                        $randomDigit = $faker->numberBetween(5,10);
                        $penerimaan = $faker->randomNumber($randomDigit);
                        $pengeluaran = NULL;
                        $data_anggaran = new Dataanggaran;
                        $save_data_anggaran = $data_anggaran->create([
                            'data_anggaran_deskripsi' => $desk,
                            'data_anggaran_debet' => $penerimaan,
                            'data_anggaran_kredit' => $pengeluaran,
                            'data_anggaran_tanggal' => $anggaran_tanggal,
                            'anggaran_id' => $ang->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                        dd($save_data_anggaran);
                        $save_data_anggaran->save();
                        break;
                    case 'PENERIMAAN':
                        $randomDigit = $faker->numberBetween(5,10);
                        $pengeluaran = $faker->randomNumber($randomDigit);
                        $penerimaan = NULL;
                        $data_anggaran = new Dataanggaran;
                        $save_data_anggaran = $data_anggaran->create([
                            'data_anggaran_deskripsi' => $desk,
                            'data_anggaran_debet' => $penerimaan,
                            'data_anggaran_kredit' => $pengeluaran,
                            'data_anggaran_tanggal' => $anggaran_tanggal,
                            'anggaran_id' => $ang->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                        dd($save_data_anggaran);
                        $save_data_anggaran->save();
                        break;
                }
            }
        }
    }
}
