<!-- resources/views/pyview.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Multiple Python Variables in Laravel View</title>
</head>
<body>
    <h1>Python Variables:</h1>
    <p>Variable 1: {{ $pythonData['variable1'] }}</p>
    <p>Variable 2: {{ $pythonData['variable2'] }}</p>
    <p>Variable 3: {{ implode(', ', $pythonData['variable3']) }}</p>
</body>
</html>