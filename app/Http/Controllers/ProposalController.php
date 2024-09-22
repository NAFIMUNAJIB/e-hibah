<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProposalRequest;
use App\Models\Proposal;
use App\Models\ProposalMilestone;

class ProposalController extends Controller
{
    public function list()
    {
        $data = [];
        $data['page_title'] = 'Proposal';
        $data['page'] = 'proposal';
        $data['data'] = Proposal::orderBy('id','desc')->paginate(10);

        return view('public.pages.proposal.list',$data);
    }

    public function create()
    {
        $data = [];
        $data['page_title'] = 'Proposal';
        $data['page'] = 'proposal';

        return view('public.pages.proposal.create',$data);
    }

    public function store(StoreProposalRequest $request)
    {
        try
        {
            $proposalId = Proposal::insertGetId([
                'nama_organisasi' => $request->nama_organisasi,
                'no_telp_organisasi' => $request->no_telp_organisasi,
                'email_organisasi' => $request->email_organisasi,
                'alamat_organisasi' => $request->alamat_organisasi,
                'peruntukan' => $request->peruntukan,
                'lampiran' => $request->file('lampiran')->store('lampiran'),
                'tahapan' => 'daftar',
                'nilai' => str_replace(',','',$request->nilai),
                'tanggal_pengajuan' =>  date('Y-m-d')
            ]);

            ProposalMilestone::create([
                'proposal_id' => $proposalId,
                'status' => 'daftar',
                'status_by' => $request->nama_organisasi
            ]);

            return redirect()->route('proposal.list')->with('success', 'Proposal berhasil disimpan, menunggu proses validasi');
        }
        catch (\Exception $e)
        {
            return redirect()
            ->route('proposal.create')
            ->withInput()
            ->withErrors(['error' => 'Gagal menyimpan data : ' .$e->getMessage()]);
        }
    }
}
