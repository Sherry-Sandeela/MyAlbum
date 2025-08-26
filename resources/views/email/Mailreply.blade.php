<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-5">

<div class="container">
    <h2 class="mb-4">Send Email</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('email.send') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Recipient Email</label>
            <input type="email" name="recipient" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Select Template</label>
            <select id="templateSelect" class="form-control">
                <option value="">-- Select Template --</option>
                @foreach($templates as $template)
                    <option value="{{ $template->content }}">{{ $template->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea id="content" name="content" rows="6" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>
</div>

<script>
    // Jab dropdown se template select kare, textarea me load ho jaye
    $('#templateSelect').on('change', function() {
        let content = $(this).val();
        $('#content').val(content);
    });
</script>

</body>
</html>
