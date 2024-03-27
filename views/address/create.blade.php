<!DOCTYPE html>
<html>
<head>
    <title>Create Address</title>
</head>
<body>
    <h2>Create Address</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('address.store') }}" method="POST">
        @csrf
        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street" required><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br>
        <label for="province">Province:</label><br>
        <input type="text" id="province" name="province" required><br>
        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country" required><br>
        <label for="postal_code">Postal Code:</label><br>
        <input type="text" id="postal_code" name="postal_code" required><br><br>
        <input type="submit" value="Submit">
    </form>
    
    <!-- Add button to return to homepage or other page -->
    <a href="{{ route('home') }}">Back to Homepage</a>
</body>
</html>
