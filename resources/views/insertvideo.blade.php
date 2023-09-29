<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload MP4 Video</title>
</head>
<body>
    <h1>Upload MP4 Video</h1>
    <form action="{{ route('upload.video') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="video" accept=".mp4">
        
        <label for="folder">Select Folder:</label>
        <select name="folder" id="folder">
            <option value="Extraversion">Extraversion</option>
            <option value="Conscientiousness">Conscientiousness</option>
            <option value="Agreeableness">Agreeableness</option>
            <option value="Openness">Openness</option>
            <option value="Neuroticism">Neuroticism</option>
            <option value="Realistic">Realistic</option>
            <option value="Investigative">Investigative</option>
            <option value="Artistic">Artistic</option>
            <option value="Social">Social</option>
            <option value="Enterprising">Enterprising</option>
            <option value="Conventional">Conventional</option>
            <option value="Perseptual">Perseptual</option>
            <option value="Psikomotor">Psikomotor</option>
            <option value="Intelektual">Intelektual</option>
            <!-- Add more options as needed -->
        </select>
        
        <button type="submit">Add Video</button>
    </form>
</body>
</html>

