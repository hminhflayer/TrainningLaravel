@extends('layouts.app')

@section('content')
<div class="pd-2">  
  <form class="ui form" id="formData">
    <div class="field">
      <label>Họ tên</label>
      <input type="text" name="hoTen">
    </div>
    <div class="field">
      <label>Email</label>
      <input type="text" name="email">
    </div>
    <div class="field">
      <label>Số điện thoại</label>
      <input type="text" name="soDienThoai">
    </div>
    <div class="field">
      <label>Dân tộc</label>
      <input type="text" name="danToc">
    </div>
    <div class="field">
      <label>Giới tính</label>
      <input type="text" name="gioiTinh">
    </div>
    <div class="field">
      <label>Nghề nghiệp</label>
      <input type="text" name="ngheNghiep">
    </div>
    <input class="ui button" onclick="GetDataUser()" type="button" value="SUBMIT" />
    <input class="ui button" onclick="DeleteDocument()" type="button" value="DELETE" />
  </form>
</div>
<script>
  function GetDataUser(){
      var formData = new FormData(document.getElementById('formData'));
        
      axios.post('http://127.0.0.1:8000/api/document/create', formData)
        .then(function (response) {
          alert(response.data.message);
        })
        .catch(function (error) {
          if (error.response) {
            // Request đã được tạo ra và server đã hồi đáp với một mã trạng thái
            // nằm ra ngoài tầm 2xx
            alert(error.response.data.message.email);
          } else if (error.request) {
            // Request đã được tạo ra nhưng không nhận được hồi đáp nào
            // Trong trình duyệt, `error.request` là instance của XMLHttpRequest
            // còn trong node.js thì nó là instance của http.ClientRequest
            console.log(error.request);
          } else {
            // Điều gì đó đã xảy ra trong bước thiết lập request rồi gây nên lỗi
            console.log('Lỗi', error.message);
          }
          console.log(error.config);

      });
    }

    function DeleteDocument(){
      var formData = new FormData(document.getElementById('formData'));
        
      axios.post('http://127.0.0.1:8000/api/document/delete', formData)
        .then(function (response) {
          alert(response.data.message);
        })
        .catch(function (error) {
          if (error.response) {
            // Request đã được tạo ra và server đã hồi đáp với một mã trạng thái
            // nằm ra ngoài tầm 2xx
            alert(error.response.data.message.email);
          } else if (error.request) {
            // Request đã được tạo ra nhưng không nhận được hồi đáp nào
            // Trong trình duyệt, `error.request` là instance của XMLHttpRequest
            // còn trong node.js thì nó là instance của http.ClientRequest
            console.log(error.request);
          } else {
            // Điều gì đó đã xảy ra trong bước thiết lập request rồi gây nên lỗi
            console.log('Lỗi', error.message);
          }
          console.log(error.config);

      });
    }
</script>
@endsection