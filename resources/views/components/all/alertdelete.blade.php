
    @if (session('msgdan'))
<script>
  document.addEventListener("DOMContentLoaded", function() {
    showToast();
  });

  function showToast() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'error',
      title: '{{ session('msgdan') }}'
    });
  }
</script>
@endif
