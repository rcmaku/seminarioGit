<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Rotator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .user-list {
            margin: 20px auto;
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left;
        }
        .user-list div {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }
        .user-list div:last-child {
            border-bottom: none;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<h1>User Rotator</h1>
<div class="user-list">
    @foreach ($users as $index => $user)
        <div style="{{ $index === 0 ? 'font-weight: bold;' : '' }}">
            User ID: {{ $user }}
        </div>
    @endforeach
</div>

<form method="POST" action="{{ route('users.rotate') }}">
    @csrf
    <button type="submit">Rotate Users</button>
</form>
</body>
</html>
