<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Models\ProposalMilestone;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proposals')->truncate();

        $proposals = [
            [
                'nama_organisasi' => 'ABC Charity',
                'no_telp_organisasi' => '789012345',
                'email_organisasi' => 'abccharity@email.com',
                'alamat_organisasi' => 'Jln Kemanusiaan Baru',
                'peruntukan' => 'Permohonan Dana Bantuan untuk Panti Asuhan Anak Yatim',
                'lampiran' => 'lampiran/abccharity_proposal.pdf',
                'nilai' => 2000000,
                'tahapan' => 'verifikasi',
                'tanggal_pengajuan' => '2023-12-10',
            ],
            [
                'nama_organisasi' => 'Green Earth',
                'no_telp_organisasi' => '567890123',
                'email_organisasi' => 'greenearth@gmail.com',
                'alamat_organisasi' => 'Jln Lingkungan Indah',
                'peruntukan' => 'Permohonan Hibah untuk Program Penanaman Pohon',
                'lampiran' => 'lampiran/greenearth_proposal.pdf',
                'nilai' => 800000,
                'tahapan' => 'proses',
                'tanggal_pengajuan' => '2023-12-12',
            ],
            [
                'nama_organisasi' => 'Youth Empowerment',
                'no_telp_organisasi' => '678901234',
                'email_organisasi' => 'youthempowerment@youth.org',
                'alamat_organisasi' => 'Jln Pemuda Berprestasi',
                'peruntukan' => 'Permohonan Bantuan Program Pendidikan dan Pelatihan',
                'lampiran' => 'lampiran/youthempowerment_proposal.pdf',
                'nilai' => 1500000,
                'tahapan' => 'evaluasi',
                'tanggal_pengajuan' => '2023-12-15',
            ],
            [
                'nama_organisasi' => 'Health Harmony',
                'no_telp_organisasi' => '890123456',
                'email_organisasi' => 'healthharmony@email.com',
                'alamat_organisasi' => 'Jln Kesehatan Sejahtera',
                'peruntukan' => 'Permohonan Dana untuk Kampanye Kesehatan Masyarakat',
                'lampiran' => 'lampiran/healthharmony_proposal.pdf',
                'nilai' => 1200000,
                'tahapan' => 'daftar',
                'tanggal_pengajuan' => '2023-12-18',
            ],
            [
                'nama_organisasi' => 'Tech Innovators',
                'no_telp_organisasi' => '901234567',
                'email_organisasi' => 'techinnovators@gmail.com',
                'alamat_organisasi' => 'Jln Inovasi Cerdas',
                'peruntukan' => 'Permohonan Dukungan Hibah untuk Proyek Inovasi Teknologi',
                'lampiran' => 'lampiran/techinnovators_proposal.pdf',
                'nilai' => 2500000,
                'tahapan' => 'verifikasi',
                'tanggal_pengajuan' => '2023-12-21',
            ],
            [
                'nama_organisasi' => 'Sports Stars',
                'no_telp_organisasi' => '123456789',
                'email_organisasi' => 'sportsstars@sports.org',
                'alamat_organisasi' => 'Jln Olahraga Hebat',
                'peruntukan' => 'Permohonan Bantuan untuk Pengembangan Olahraga',
                'lampiran' => 'lampiran/sportsstars_proposal.pdf',
                'nilai' => 1800000,
                'tahapan' => 'proses',
                'tanggal_pengajuan' => '2023-12-24',
            ],
            [
                'nama_organisasi' => 'Artistic Express',
                'no_telp_organisasi' => '234567890',
                'email_organisasi' => 'artisticexpress@gmail.com',
                'alamat_organisasi' => 'Jln Seni Kreatif',
                'peruntukan' => 'Permohonan Hibah untuk Program Pengembangan Seni',
                'lampiran' => 'lampiran/artisticexpress_proposal.pdf',
                'nilai' => 900000,
                'tahapan' => 'evaluasi',
                'tanggal_pengajuan' => '2023-12-28',
            ],
            [
                'nama_organisasi' => 'Education First',
                'no_telp_organisasi' => '345678901',
                'email_organisasi' => 'educationfirst@email.com',
                'alamat_organisasi' => 'Jln Pendidikan Berkualitas',
                'peruntukan' => 'Permohonan Dana untuk Peningkatan Fasilitas Pendidikan',
                'lampiran' => 'lampiran/educationfirst_proposal.pdf',
                'nilai' => 1600000,
                'tahapan' => 'daftar',
                'tanggal_pengajuan' => '2024-01-02',
            ],
            [
                'nama_organisasi' => 'Eco Warriors',
                'no_telp_organisasi' => '456789012',
                'email_organisasi' => 'ecowarriors@gmail.com',
                'alamat_organisasi' => 'Jln Peduli Lingkungan',
                'peruntukan' => 'Permohonan Dukungan Hibah untuk Proyek Pelestarian Alam',
                'lampiran' => 'lampiran/ecowarriors_proposal.pdf',
                'nilai' => 2200000,
                'tahapan' => 'verifikasi',
                'tanggal_pengajuan' => '2024-01-05',
            ],
            [
                'nama_organisasi' => 'Social Impact',
                'no_telp_organisasi' => '567890123',
                'email_organisasi' => 'socialimpact@email.com',
                'alamat_organisasi' => 'Jln Pengaruh Positif',
                'peruntukan' => 'Permohonan Bantuan untuk Program Pemberdayaan Masyarakat',
                'lampiran' => 'lampiran/socialimpact_proposal.pdf',
                'nilai' => 1300000,
                'tahapan' => 'proses',
                'tanggal_pengajuan' => '2024-01-08',
            ],
        ];

        DB::table('proposals')->insert($proposals);
        DB::table('proposal_milestones')->truncate();

        $proposals = DB::table('proposals')->get();

        foreach ($proposals as $proposal) {
            $proposalId = $proposal->id;

            ProposalMilestone::create([
                'proposal_id' => $proposalId,
                'status' => 'daftar',
                'status_by' => $proposal->nama_organisasi,
                'created_at' => $proposal->tanggal_pengajuan . ' 00:00:00',
                'updated_at' => $proposal->tanggal_pengajuan . ' 00:00:00',
            ]);

            // Tambahkan tahapan lainnya sesuai dengan urutan tahapan proposal
            ProposalMilestone::create([
                'proposal_id' => $proposalId,
                'status' => 'verifikasi',
                'status_by' => 'Nama Pemeriksa',
                'created_at' => Carbon::parse($proposal->tanggal_pengajuan)->addDay()->toDateTimeString(),
            ]);

            ProposalMilestone::create([
                'proposal_id' => $proposalId,
                'status' => 'pengecekan proposal',
                'status_by' => 'Nama Pemeriksa',
                'created_at' => Carbon::parse($proposal->tanggal_pengajuan)->addDay()->toDateTimeString(),
            ]);

            ProposalMilestone::create([
                'proposal_id' => $proposalId,
                'status' => 'evaluasi',
                'status_by' => 'Nama Pemeriksa',
                'created_at' => Carbon::parse($proposal->tanggal_pengajuan)->addDay()->toDateTimeString(),
            ]);

            // Tambahkan tahapan lainnya sesuai dengan urutan tahapan proposal
        }
    }
}
