<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Email Form 1</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('email.send') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">To</label>
                <input type="email" name="to" id="to" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Message</label>
                <textarea name="text" id="text" rows="5" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment</label>
                <input type="file" name="attachment" id="attachment" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Send Email</button>
        </form>
    </div>
</body>
</html>
