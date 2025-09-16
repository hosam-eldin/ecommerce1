<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "timeOut": "5000",
      "positionClass": "toast-top-right"
   }



   @if (session('success'))
      toastr.success("{{ session('success') }}");
   @endif

   @if (session('error'))
      toastr.error("{{ session('error') }}");
   @endif

   @if (session('warning'))
      toastr.warning("{{ session('warning') }}");
   @endif

   @if (session('info'))
      toastr.info("{{ session('info') }}");
   @endif
</script>
