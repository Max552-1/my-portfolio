<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use App\Models\Skill;
use App\Models\Message;
use App\Models\Education;

class PortfolioController extends Controller
{
    public function home()
    {
        $information = \App\Models\Information::firstOrCreate(['id' => 1], [
            'name' => 'Dinesh Khatri',
            'title' => 'PHP & Laravel Developer',
            'hero_description' => 'I am a student passionate about programming, web development and building useful applications. I enjoy creating modern and user-friendly web applications.',
            'about_description' => "My name is Dinesh Khatri. I am a student interested in software development and web technologies.\n\nI enjoy learning programming languages, developing web applications and working on projects that help me improve my technical skills.\n\nCurrently, I am developing my skills in PHP, Laravel, Java, Python, HTML, CSS, JavaScript and MySQL.",
            'github_url' => 'https://github.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'email' => 'your-email@example.com',
        ]);
        return view('home', compact('information'));
    }

    public function about()
    {
        $information = \App\Models\Information::firstOrCreate(['id' => 1], [
            'name' => 'Dinesh Khatri',
            'title' => 'PHP & Laravel Developer',
            'hero_description' => 'I am a student passionate about programming, web development and building useful applications. I enjoy creating modern and user-friendly web applications.',
            'about_description' => "My name is Dinesh Khatri. I am a student interested in software development and web technologies.\n\nI enjoy learning programming languages, developing web applications and working on projects that help me improve my technical skills.\n\nCurrently, I am developing my skills in PHP, Laravel, Java, Python, HTML, CSS, JavaScript and MySQL.",
            'github_url' => 'https://github.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'email' => 'your-email@example.com',
        ]);
        return view('about', compact('information'));
    }

    public function education()
{
    $educations = Education::all();
    return view('education', compact('educations'));
}

   public function skills()
{
    $skills = Skill::all();

    return view('skills', compact('skills'));
}

  public function projects()
{
    $projects = Project::all();

    return view('projects', compact('projects'));
}

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
{
    // Validate the form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Save message to database
    Message::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    try {

        // Send email to your Gmail
        Mail::raw(
            "You received a new message from your portfolio website.\n\n" .
            "Name: " . $request->name . "\n" .
            "Email: " . $request->email . "\n\n" .
            "Message:\n" . $request->message,

            function ($mail) use ($request) {

                $mail->to(config('mail.contact_email'))
                     ->subject('New Message From Portfolio')
                     ->replyTo(
                         $request->email,
                         $request->name
                     );
            }
        );

        return back()->with(
            'success',
            'Your message has been sent successfully!'
        );

    } catch (\Exception $e) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Sorry, we could not send your message. Please try again later.'
            );
    }
}
}