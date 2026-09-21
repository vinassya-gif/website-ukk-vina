<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Berita;

class SekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfilSekolah::create([
            'foto_kepala_sekolah' => null,
            'sambutan' => 'Assalamu\'alaikum warahmatullahi wabarakatuh. Selamat datang di website resmi SMK Negeri 1 Harapan Bangsa. Kami berkomitmen untuk terus meningkatkan kualitas pendidikan agar mampu mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia kerja maupun pendidikan tinggi. Mari bersama-sama membangun generasi unggul dari sekolah ini.',
            'nama_sekolah' => 'SMK Negeri 1 Cijati',
            'npsn' => '20123456',
            'akreditasi' => 'A',
            'tahun_berdiri' => 2006,
            'kepala_sekolah' => 'A.Rahmat Dimyati SPd,MPd.',
            'alamat' => 'Jl. Pendidikan No. 10, Bandung, Jawa Barat',
            'telepon' => '(022) 1234567',
            'email' => 'info@smkn1harapanbangsa.sch.id',
            'visi' => 'Menjadi sekolah unggul yang menghasilkan lulusan kompeten, berkarakter, dan siap kerja.',
            'misi' => 'Menyelenggarakan pendidikan berkualitas, membangun kemitraan industri, dan menumbuhkan jiwa wirausaha siswa.',
            'jumlah_siswa' => 850,
        ]);

        $jurusans = [
            ['nama_jurusan' => 'Rekayasa Perangkat Lunak', 'kode_jurusan' => 'RPL', 'jumlah_siswa' => 210, 'deskripsi' => 'Fokus pada pengembangan aplikasi dan web.'],
            ['nama_jurusan' => 'Teknik Komputer & Jaringan', 'kode_jurusan' => 'TKJ', 'jumlah_siswa' => 190, 'deskripsi' => 'Fokus pada jaringan komputer dan infrastruktur IT.'],
            ['nama_jurusan' => 'Akuntansi', 'kode_jurusan' => 'AK', 'jumlah_siswa' => 180, 'deskripsi' => 'Fokus pada pembukuan dan keuangan.'],
            ['nama_jurusan' => 'Multimedia', 'kode_jurusan' => 'MM', 'jumlah_siswa' => 150, 'deskripsi' => 'Fokus pada desain grafis dan produksi media.'],
        ];
        foreach ($jurusans as $j) { Jurusan::create($j); }

        $ekskul = [
            ['nama' => 'Pramuka', 'pembina' => 'Ibu Sri Wahyuni', 'jadwal' => 'Jumat, 14.00', 'deskripsi' => 'Melatih kedisiplinan dan kemandirian.'],
            ['nama' => 'Basket', 'pembina' => 'Bapak Rudi Hartono', 'jadwal' => 'Rabu, 15.30', 'deskripsi' => 'Latihan rutin dan persiapan turnamen antar sekolah.'],
            ['nama' => 'Paduan Suara', 'pembina' => 'Ibu Lestari', 'jadwal' => 'Selasa, 15.00', 'deskripsi' => 'Mengisi acara sekolah dan lomba paduan suara.'],
            ['nama' => 'Robotik', 'pembina' => 'Bapak Fajar', 'jadwal' => 'Kamis, 15.00', 'deskripsi' => 'Merancang dan membuat robot untuk kompetisi.'],
        ];
        foreach ($ekskul as $e) { Ekstrakurikuler::create($e); }

        $guru = [
            ['nama' => 'Drs. Ahmad Sutanto, M.Pd.', 'nip' => '196501011990031001', 'jabatan' => 'Kepala Sekolah', 'mapel' => '-', 'is_staff' => false],
            ['nama' => 'Sri Wahyuni, S.Pd.', 'nip' => '197203122005012001', 'jabatan' => 'Guru', 'mapel' => 'Bahasa Indonesia', 'is_staff' => false],
            ['nama' => 'Rudi Hartono, S.Pd.', 'nip' => '198004152008011002', 'jabatan' => 'Guru', 'mapel' => 'Penjaskes', 'is_staff' => false],
            ['nama' => 'Fajar Nugroho, S.Kom.', 'nip' => '198809012015031003', 'jabatan' => 'Guru', 'mapel' => 'Pemrograman', 'is_staff' => false],
            ['nama' => 'Dewi Anjani', 'nip' => '199001012019022001', 'jabatan' => 'Tata Usaha', 'mapel' => '-', 'is_staff' => true],
            ['nama' => 'Bambang Setiawan', 'nip' => '198511202016011004', 'jabatan' => 'Petugas Perpustakaan', 'mapel' => '-', 'is_staff' => true],
        ];
        foreach ($guru as $g) { Guru::create($g); }

        $galeri = [
            ['judul' => 'Upacara Bendera', 'gambar' => 'https://picsum.photos/seed/upacara/600/400', 'kategori' => 'Kegiatan'],
            ['judul' => 'Lomba Robotik', 'gambar' => 'https://picsum.photos/seed/robotik/600/400', 'kategori' => 'Prestasi'],
            ['judul' => 'Perpustakaan', 'gambar' => 'https://picsum.photos/seed/perpus/600/400', 'kategori' => 'Fasilitas'],
            ['judul' => 'Laboratorium Komputer', 'gambar' => 'https://picsum.photos/seed/lab/600/400', 'kategori' => 'Fasilitas'],
            ['judul' => 'Pentas Seni', 'gambar' => 'https://picsum.photos/seed/pentas/600/400', 'kategori' => 'Kegiatan'],
            ['judul' => 'Wisuda Kelulusan', 'gambar' => 'https://picsum.photos/seed/wisuda/600/400', 'kategori' => 'Kegiatan'],
        ];
        foreach ($galeri as $g) { Galeri::create($g); }

        $berita = [
            ['judul' => 'Siswa Raih Juara 1 Lomba Robotik Tingkat Provinsi', 'isi' => 'Tim robotik sekolah berhasil meraih juara 1 pada kompetisi robotik tingkat provinsi yang diselenggarakan pekan lalu...', 'gambar' => 'https://picsum.photos/seed/berita1/600/400', 'penulis' => 'Admin', 'tanggal' => now()->subDays(2)],
            ['judul' => 'Penerimaan Peserta Didik Baru Tahun Ajaran Baru Dibuka', 'isi' => 'Pendaftaran peserta didik baru resmi dibuka mulai hari ini. Calon siswa dapat mendaftar secara online...', 'gambar' => 'https://picsum.photos/seed/berita2/600/400', 'penulis' => 'Admin', 'tanggal' => now()->subDays(5)],
            ['judul' => 'Kegiatan Bakti Sosial di Panti Asuhan', 'isi' => 'Sebagai wujud kepedulian sosial, seluruh siswa kelas XII mengikuti kegiatan bakti sosial di panti asuhan...', 'gambar' => 'https://picsum.photos/seed/berita3/600/400', 'penulis' => 'Admin', 'tanggal' => now()->subDays(10)],
        ];
        foreach ($berita as $b) { Berita::create($b); }
    }
}