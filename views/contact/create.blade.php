<!-- resources/views/contacts/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Contact</title>
</head>
<body>
    <h2>Create Contact</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <!-- Add button to return to homepage or other page -->
    <a href="{{ route('home') }}">Back to Homepage</a>
</body>
</html>
