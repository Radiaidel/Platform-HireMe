<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #fff; color: #000; padding: 20px;">
<div style="display:flex; justify-content :space-between;align-items:center;">

    <div class="user-info">
        <img src="{{ $user->image_url }}" alt="User Image" style="width: 100px; border-radius: 50%;">
        <p>{{ $user->name }}</p>
    </div>
    <div>
        <h3>{{ auth()->user()->jobSeeker->title }}</h3>
    </div>
    <div class="contact-info" style="text-align: left;">
        <p>{{ auth()->user()->jobSeeker->address }}</p>
        <p>{{ auth()->user()->jobSeeker->contact_information }}</p>
    </div>
</div>
    <p>{{ auth()->user()->jobSeeker->about }}</p>
    <div class="cv-container">
        <div class="skills">
            <h2 style="color: #007bff; font-size: 20px; margin-bottom: 10px;">Compétences</h2>
            <ul style="list-style-type: disc; padding-left: 20px;">
                @foreach ($cv->skills as $skill)
                <li>{{ $skill['category'] }}: {{ $skill['technologies'] }}</li>
                @endforeach
            </ul>
        </div>
        <div class="experiences">
            <h2 style="color: #007bff; font-size: 20px; margin-bottom: 10px;">Expériences professionnelles</h2>
            <ul style="list-style-type: disc; padding-left: 20px;">
                @foreach ($cv->experiences as $experience)
                <li>{{ $experience['job'] }} chez {{ $experience['company'] }} ({{ $experience['location'] }}) - {{ $experience['startDate'] }} à {{ $experience['endDate'] }}</li>
                @endforeach
            </ul>
        </div>
        <div class="education">
            <h2 style="color: #007bff; font-size: 20px; margin-bottom: 10px;">Cursus éducatif</h2>
            <ul style="list-style-type: disc; padding-left: 20px;">
                @foreach ($cv->education as $education)
                <li>{{ $education['school'] }} ({{ $education['location'] }}) - {{ $education['startDate'] }} à {{ $education['endDate'] }}</li>
                @endforeach
            </ul>
        </div>
        <div class="languages">
            <h2 style="color: #007bff; font-size: 20px; margin-bottom: 10px;">Langues maîtrisées</h2>
            <ul style="list-style-type: disc; padding-left: 20px;">
                @foreach ($cv->languages as $language)
                <li>{{ $language['name'] }} - Niveau: {{ $language['level'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
