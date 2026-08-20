@extends('layouts.app')

@section('title', 'About Me')

@section('content')

<section class="page">

    <h1>About Me</h1>

    <div class="about-content">

        <div class="about-text">

            <h2>Who Am I?</h2>

            <div class="about-description">
                @if(isset($information) && !empty($information->about_description))
                    {!! nl2br(e($information->about_description)) !!}
                @else
                    <p>
                        My name is Dinesh Khatri. I am a student
                        interested in software development and web technologies.
                    </p>

                    <p>
                        I enjoy learning programming languages,
                        developing web applications and working on
                        projects that help me improve my technical skills.
                    </p>

                    <p>
                        Currently, I am developing my skills in PHP,
                        Laravel, Java, Python, HTML, CSS, JavaScript and MySQL.
                    </p>
                @endif
            </div>

        </div>

    </div>

</section>

@endsection