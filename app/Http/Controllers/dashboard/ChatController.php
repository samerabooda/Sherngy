<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\models\ChatAnswer;
use App\models\ChatHeader;
use App\models\ChatHeaderTranslations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ChatController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {

            $data = ChatHeader::get();

            return Datatables::of($data)
                ->addIndexColumn()

//                ->editColumn('header',function ($row){
//                    return 'asdasd';
//
//                })
                ->addColumn('action', function($row){

                    if (auth()->user()->hasPermission('chat_update')){
                        $btn = '
                        <a href="'.route('chat.edit',$row->id).'" class="btn btn-warning btn-sm edit">
                        <i class="fa fa-edit"></i>
                        </a>
                        ';
                    }else{
                        $btn = '<button class="btn btn-warning btn-sm disabled"><i class="fa fa-edit"></i></button>';
                    }

                    if (auth()->user()->hasPermission('chat_delete')){
                        $btn = $btn . '
                     <form action="'.route('chat.destroy',$row->id).'" id="delform" method="post" style="display: inline-block">
                        <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                    </form>';
                    }else{
                        $btn = $btn. '<button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>';
                    }


                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.chat.index');

    }// end of index


    public function create(){
        $header = ChatHeader::where('parent_id',0)->get();
       return view('dashboard.chat.create',compact('header'));
    }// end of create

    public function store(Request $request){

        $request->validate([
           'header' => 'required',
           'answer' => 'required',
           'parent_id' => 'required',
        ]);

        $addedHeader = ChatHeader::create([
           'header' => $request->header,
           'parent_id' => $request->parent_id,
        ]);

        ChatAnswer::create([
           'answer' => $request->answer,
            'chat_header_id' => $addedHeader->id
        ]);

        ChatHeaderTranslations::create([
            'chat_header_id' => $addedHeader->id,
                'translation' => $request->headerTranslations,
        ]);


        session()->flash('success','تم الاضافة بنجاح');
        return redirect()->back();
    }


    public function edit(Request $request,$id){
        $header = DB::table('chat_headers')
//            ->select('chat_headers.id','chat_headers.header',' chat_headers.parent_id', 'chat_answers.answer', 'chat_header_translations.translation')
            ->leftJoin('chat_answers','chat_headers.id','=','chat_answers.chat_header_id')
            ->leftJoin('chat_header_translations','chat_headers.id','=','chat_header_translations.chat_header_id')->

            where('chat_headers.id',$id)
            ->first();

        $headers = ChatHeader::get();

//        dd($header);
        return view('dashboard.chat.edit',compact('headers','header'));
    }


    public function update(Request $request,$id){

        $request->validate([
            'header' => 'required',
            'answer' => 'required',
            'parent_id' => 'required',
        ]);

        $addedHeader = ChatHeader::where('id',$id)->update([
            'header' => $request->header,
            'parent_id' => $request->parent_id,
        ]);

        ChatAnswer::where('chat_header_id',$id)->update([
            'answer' => $request->answer,
            'chat_header_id' => $id
        ]);

        ChatHeaderTranslations::where('chat_header_id',$id)->update([
            'chat_header_id' => $id,
            'translation' => $request->headerTranslations,
        ]);


        session()->flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function destroy(Request $request,$id){
        $header = ChatHeader::where('id',$id)->first();
        $header->delete();

        return response()->json(['status'=>'success']);
    }


}
