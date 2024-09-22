<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Proposal;
use App\Models\ProposalMilestone;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use DB;
use Auth;
class ProposalController extends Controller
{
    public function index()
    {
        $data = [];
        $data['page_title'] = 'Proposal';
        $data['page'] = 'proposal';

        return view('admin.pages.proposal.index',$data);
    }

    public function show($id)
    {
        $data = [];
        $data['page_title'] = 'Detail Proposal';
        $data['page'] = 'proposal';
        $data['row'] = Proposal::with('proposalMilestone')->find($id);

        return view('admin.pages.proposal.show',$data);
    }

    public function create()
    {
        $data = [];
        $data['page_title'] = 'Proposal';
        $data['page'] = 'proposal';

        return view('admin.pages.proposal.create',$data);
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
                'tahapan' => $request->tahapan,
                'nilai' => str_replace(',','',$request->nilai),
                'tanggal_pengajuan' => $request->tanggal_pengajuan
            ]);

            ProposalMilestone::create([
                'proposal_id' => $proposalId,
                'status' => $request->tahapan,
                'status_by' => Auth()->user()->name
            ]);

            return redirect()->route('admin.proposal.index')->with('success', 'Data Berhasil Disimpan');
        }
        catch (\Exception $e)
        {
            return redirect()
            ->route('admin.proposal.create')
            ->withInput()
            ->withErrors(['error' => 'Gagal menyimpan data : ' .$e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['page_title'] = 'Proposal';
        $data['page'] = 'proposal';

        $data['row'] = Proposal::find($id);

        return view('admin.pages.proposal.edit',$data);
    }

    public function update(UpdateProposalRequest $request,$id)
    {
        try
        {
            DB::beginTransaction();

            $exisiting = Proposal::find($id);

            $updates = [
                'nama_organisasi' => $request->nama_organisasi,
                'no_telp_organisasi' => $request->no_telp_organisasi,
                'email_organisasi' => $request->email_organisasi,
                'alamat_organisasi' => $request->alamat_organisasi,
                'peruntukan' => $request->peruntukan,
                'tahapan' => $request->tahapan,
                'nilai' => str_replace(',', '', $request->nilai),
            ];

            if ($request->hasFile('lampiran')) {
                $updates['lampiran'] = $request->file('lampiran')->store('lampiran');
            }

            if($request->tahapan != $exisiting->tahapan)
            {
                ProposalMilestone::create([
                    'proposal_id' => $id,
                    'status' => $request->tahapan,
                    'status_by' => Auth()->user()->name
                ]);
            }

            $exisiting->update($updates);

            DB::commit();

            return redirect()->route('admin.proposal.index')->with('success', 'Perubahan berhasil disimpan');
        }
        catch (\Exception $e)
        {
            DB::rollback();

            return redirect()
            ->route('admin.proposal.edit',['proposal' => $id])
            ->withInput()
            ->withErrors(['error' => 'Gagal menyimpan data : ' .$e->getMessage()]);
        }
    }

    public function datatable()
    {
        $data = Proposal::orderBy('id','desc');

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $routeEdit = route('admin.proposal.edit', ['proposal' => $row->id]); // Define the Show route
            $routeDetail = route('admin.proposal.show', ['proposal' => $row->id]); // Define the Show route

            $actionBtn = '<a href="' . $routeEdit . '" class="edit btn btn-sm btn-success" style="margin:2px">Edit</a> <a href="' . $routeDetail . '" class="edit btn btn-sm btn-info" style="margin:2px">Detail</a> <button class="delete btn btn-sm btn-danger" style="margin:2px">Hapus</button>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
