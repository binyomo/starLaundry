<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Topbar;
use App\Models\Hero;
use App\Models\About;
use App\Models\Contact;
use App\Models\Message;

class WebContentController extends Controller
{
	// 
	// 
	// TOPBAR
    public function indexTopbar()
    {
        return view('admin.web.topbar.index', [
            'topbar' => Topbar::where('id', 1)->first()
        ]);
    }

    public function updateTopbar(Request $request, Topbar $topbar)
    {
        $validatedData = $request->validate([
            'text_1' => 'required',
            'icon_1' => 'required',
            'text_2' => 'required',
            'icon_2' => 'required',
            'text_3' => 'required',
            'icon_3' => 'required'
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Topbar::where('id', $request->id)
            ->update($validatedData);

        return redirect('/admin/topbar')
                ->with('success', 'Update Topbar Berhasil!');
    }


    // 
    // 
    // HERO
    public function indexHero()
    {
        return view('admin.web.hero.index', [
            'hero' => Hero::where('id', 1)->first()
        ]);
    }

    public function updateHero(Request $request, Hero $hero)
    {
        $validatedData = $request->validate([
            'm_title' => 'required',
            'm_desc' => 'required',
            'icon_1' => 'required',
            'title_1' => 'required',
            'desc_1' => 'required',
            'icon_2' => 'required',
            'title_2' => 'required',
            'desc_2' => 'required',
            'icon_3' => 'required',
            'title_3' => 'required',
            'desc_3' => 'required',            
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Hero::where('id', $request->id)
            ->update($validatedData);

        return redirect('/admin/hero')
                ->with('success', 'Update Hero Berhasil!');
    }


    // 
    // 
    // ABOUT
    public function indexAbout()
    {
        return view('admin.web.about.index', [
            'about' => About::where('id', 1)->first()
        ]);
    }

    public function updateAbout(Request $request, About $about)
    {
        $validatedData = $request->validate([
            'm_title' => 'required',
            'm_desc' => 'required',
            'icon_1' => 'required',
            'title_1' => 'required',
            'desc_1' => 'required',
            'icon_2' => 'required',
            'title_2' => 'required',
            'desc_2' => 'required',
            'icon_3' => 'required',
            'title_3' => 'required',
            'desc_3' => 'required',            
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        About::where('id', $request->id)
            ->update($validatedData);

        return redirect('/admin/about')
                ->with('success', 'Update About Berhasil!');
    }


    // 
    // 
    // CONTACT
    public function indexContact()
    {
        return view('admin.web.contact.index', [
            'contact' => Contact::where('id', 1)->first()
        ]);
    }

    public function updateContact(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'desc' => 'required',
            'address' => 'required',
            'email' => 'required',
            'call' => 'required',            
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        
        Contact::where('id', $request->id)
            ->update($validatedData);

        return redirect('/admin/contact')
                ->with('success', 'Update Contact Berhasil!');
    }


    // 
    // 
    // MESSAGE
    public function indexMessage()
    {
        return view('admin.web.message.index', [
            'messages' => Message::latest()->paginate(10)
        ]);

    }

    public function showMessage(Request $request)
    {
        return view('admin.web.message.show', [
            'message' => Message::where('id', $request->id)->first()
        ]);
    }

    public function destroyMessage(Request $request)
    {
        Message::destroy($request->id);

        return redirect('/admin/message')->with('success', 'Delete Message Berhasil!');
    }
}
