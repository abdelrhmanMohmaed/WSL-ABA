
@if (count($errors) > 0)
    <script>
    var htmlContent = document.createElement("div");
    htmlContent.innerHTML =
    `
        <ul style='text-align:right'>
            @foreach ($errors->all() as $key => $error)
                <li>{{$key+1}}- {{ $error }}</li>
            @endforeach
        </ul>
    `;
    swal.fire({
    title: "تحقق",
    html: htmlContent,
    icon: "error",
    buttons: true,
    dangerMode: true,
    })
    </script>
@endif