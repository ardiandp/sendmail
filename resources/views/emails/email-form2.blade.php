<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Email Form 2</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="/send-email" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Subject</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">Recipient Email</label>
                <input type="email" name="to" id="to" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Content</label>
                <textarea name="text" id="text" rows="5" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label">Add Attachment</label>
                <input type="file" name="attachment" id="attachment" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
</body>
</html>
