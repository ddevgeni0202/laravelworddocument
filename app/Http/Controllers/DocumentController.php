<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createdocument');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
		$temp_text = "".$request->get('descryption')."";	
		
		$texttmp = $temp_text;
		$cnt = strlen($texttmp);
		$text1 = "##############&lt;!DOCTYPE html&gt;&lt;html&gt;&lt;body&gt;&lt;pre&gt;&lt;b&gt;";
		for($i=0;$i<$cnt;$i++)
		{
			if($texttmp[$i] == "\r")
				$text1 .="&lt;br&gt;";
				$text1 .=$texttmp[$i];			
		}
		$text1 .= "&lt;/b&gt;&lt;/pre&gt;&lt;/body&gt;&lt;/html&gt;################";
		//str_replace("&euro;","<br>",$request->get('descryption'));
		print_r($text1);
        $text = $section->addText($text1);	
        
  
        /*$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');		
        $objWriter->save('Appdividend.html');
        return response()->download(public_path('Appdividend.html'));*/
		
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'RTF');
        $objWriter->save('Appdividend.rtf');
        return response()->download(public_path('Appdividend.rtf'));
    }
	
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
