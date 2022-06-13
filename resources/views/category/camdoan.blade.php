@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="card-header text-center">
            <h2>DANH MỤC</h2>
        </div>

        <div class="w-100">
            <div class="row">
                <div class="col d-flex justify-content-end align-items-end">
                    <button class="btn btn-primary m-3" id="btn_add">Thêm</button>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <form id="form_category" method="POST" class="w-75 border rounded" hidden>
                    @csrf
                    <div class="row mt-3">
                        <div class="col d-flex align-items-end justify-content-end">
                            <i id="btn_close" class="fa-solid fa-circle-xmark fa-2x"></i>
                        </div>
                        <div><hr></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Tên cơ sở</label>
                            <input class="form-control" id="tencoso" name="tencoso">
                        </div>

                        <div class="col-sm">
                            <label>Tên bệnh viện</label>
                            <input class="form-control" id="tenbenhvien" name="tenbenhvien">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Tên phiếu</label>
                            <input class="form-control" id="tenphieu" name="tenphieu">
                        </div>
                        <div class="col-sm-2">
                            <label>MS</label>
                            <input class="form-control" id="MS" name="MS">
                        </div>

                        <div class="col-sm-2">
                            <label>Số BA</label>
                            <input class="form-control" id="soBA" name="soBA">
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Tôi tên là</label>
                            <input class="form-control" id="hoten" name="hoten">
                        </div>

                        <div class="col-sm-2">
                            <label>Tuổi</label>
                            <input class="form-control" id="tuoi" name="tuoi">
                        </div>

                        <div class="col-sm-2">
                            <label>Giới tính</label>
                            <select class="form-control" id="gioitinh" name="gioitinh">
                                <option value="00">Nam</option>
                                <option value="01">Nữ</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label>Dân tộc</label>
                            <input class="form-control" id="dantoc" name="dantoc">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Điện thoại</label>
                            <input class="form-control" id="dienthoai" name="dienthoai" maxlength="15">
                        </div>

                        <div class="col-sm">
                            <label>Nghề nghiệp</label>
                            <input class="form-control" id="nghenghiep" name="nghenghiep">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Là người bệnh/ người nhà người bệnh</label>
                            <input class="form-control" id="nguoibenh_nguoithan" name="nguoibenh_nguoithan">
                        </div>
                        <div class="col-sm">
                            <label>Hiện đang được điều trị tại khoa</label>
                            <input class="form-control" id="noi_dieutri" name="noi_dieutri">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Địa chỉ</label>
                            <input class="form-control" id="diachi" name="diachi">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm">
                        <p>Tôi cam đoan</p>
                            <input type="radio" id="camdoan_dongy" name="camdoan_dongy" value=true>
                            <label for="camdoan_dongy">Đồng ý xin phẫu thuật, thủ thuật, gây mê hồi sức và để giấy này làm bằng</label><br>
                            <input type="radio" id="camdoan_khongdongy" name="camdoan_dongy" value=false>
                            <label for="camdoan_khongdongy">Không đồng ý xin phẫu thuật, thủ thuật, gây mê hồi sức và để giấy này làm bằng</label><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label>Ngày tháng năm</label>
                            <input class="form-control" id="ngaythangnam" name="ngaythangnam" type="date">
                        </div>

                        <div class="col-sm">
                            <label>Người ký</label>
                            <input class="form-control" id="nguoibenh_daidien" name="nguoibenh_daidien">
                        </div>
                    </div>

                    <div class="col-sm-2">
                            <label for="btn_submit">&emsp;</label>
                            <input id="btn_submit_create" onclick="APICreateCategory()" class="form-control btn btn-primary" value="Lưu">
                            <input id="btn_submit_update" onclick="APIUpdateCategory()" class="form-control btn btn-primary" value="Cập nhật">
                        </div>
                    <div class="row mb-3 p-0 m-0">
                        <div role="alert" id="label_update"></div>
                    </div>

                </form>
            </div>
        </div>

        <table class="table align-middle table-hover">
            <tr>
                <th class="text-center">STT</th>
                <th>ID danh mục</th>
                <th>Tên danh mục</th>
                <th class="">Người tạo/Người sửa</th>
                <th class="">Mô tả</th>
                <th class="text-center">Sửa</th>
                <th class="text-center">Xóa</th>
            </tr>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>
@endsection

<script>
    var const_delete_category = "delete_category";
    var code_delete = null;

    function CreateRowItem(data, stt)
    {
        var tbody = document.getElementById("tbody");

        var itemTr = document.createElement("tr");

        var arrStt = document.createElement("td");
        arrStt.setAttribute("class", "text-center");
        arrStt.innerText = stt + 1;

        var itemId = document.createElement("td");
        if (data.hasOwnProperty("_id")) {
            itemId.innerText = data._id;
        }

        var itemName = document.createElement("td");
        if (data.hasOwnProperty("name")) {
            itemName.innerText = data.name;
        }

        var itemAuthor = document.createElement("td");
        if(data.hasOwnProperty("author_update")) {
            itemAuthor.innerText = data.author_update;
        }else if (data.hasOwnProperty("author")) {
            itemAuthor.innerText = data.author;
        }

        var itemDisc = document.createElement("td");
        if (data.hasOwnProperty("discription")) {
            itemDisc.innerText = data.discription;
        }

        var itemEdit = document.createElement("td");
            itemEdit.setAttribute("class", "text-center");
            itemEdit.onclick = () => {
                ClearForm();
                BindTextValue("name", data, "name");
                BindTextValue("discription", data, "discription");
                HiddenElement("btn_submit_create", true);
                HiddenElement("btn_submit_update", false);
                HiddenElement("form_category", false);
                code_delete = data._id;
            }

        var iEdit = document.createElement("i");
            iEdit.setAttribute('class',"fa-solid fa-pen-to-square");
        itemEdit.append(iEdit);

        var itemDelete = document.createElement("td");
            itemDelete.setAttribute("class", "text-center");
            itemDelete.onclick = () => {
                AlertDelete_Category(data);
                code_delete = data._id;
            }

        var iDelete = document.createElement("i");
            iDelete.setAttribute('class',"fa-solid fa-circle-minus");
        itemDelete.append(iDelete);

        itemTr.append(arrStt);
        itemTr.append(itemId);
        itemTr.append(itemName);
        itemTr.append(itemAuthor);
        itemTr.append(itemDisc);
        itemTr.append(itemEdit);
        itemTr.append(itemDelete);

        tbody.append(itemTr);
        return;
    }

    function AlertDelete_Category(data)
    {
        if (data.hasOwnProperty("name"))
        {
            HisShowConfirm(const_delete_category, "Xóa danh mục", "Xác nhận xóa danh mục: " + '<br/>' +'<strong>' + data.name +'</strong>');
        }
    }

    function ConfirmYesDelete_Handler(code_delete)
    {
        axios.post('/api/category/delete',{
                _id: code_delete
            })
            .then(function (response) {
                var payload = response.data.message;

                APIGetCategory();
                HisShowConfirmSucessResult(const_delete_category, payload);

            })
            .catch(function (error) {
                console.log(error);
                HisShowConfirmErrorResult(const_delete_category, payload);
            });
    }

    function RegisterEvents()
    {
        $('#btn_close').click( () => {
            ClearForm();
            HiddenElement("form_category", true);
        });

        $('#btn_add').click( () => {
            ClearForm();
            HiddenElement("form_category", false);
            HiddenElement("btn_submit_update", true);
            HiddenElement("btn_submit_create", false);
        });

        HisRegistHandlerConfirmYes(const_delete_category, function() {
            ConfirmYesDelete_Handler(code_delete);
        });

        HisRegistHandlerConfirmNo(const_delete_category, function() {
            HisClearAndHideConfirm(const_delete_category);
        });
    }

    function ClearForm()
    {
        ClearValidateForm("form_category");
        hide_result("label_update");

        BindTextValue("name", "");
        BindTextValue("discription", "");
    }

    function APIGetCategory()
    {
        document.getElementById("tbody").innerText = "";

        axios.get('/api/category/')
            .then(function (response) {
                var payload = response.data.data;
                console.log(payload);

                if (payload.length != 0) {
                    for (let i = 0; i < payload.length; i++) {
                        CreateRowItem(payload[i], i);
                    }
                }

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function APICreateCategory()
    {
        axios.post('/api/category/create', {
            name: document.getElementById('name').value,
            discription: document.getElementById('discription').value,
        })
            .then(function (response) {
                console.log(response);
                APIGetCategory();
                show_result("label_update", response.data.message, "col-12 h-100 alert alert-success text-center");
            })
            .catch(function (error) {
                console.log(error.response.data);
                let stringdata = error.response.data.message;
                let message = stringdata[Object.keys(stringdata)[0]][0];
                show_result("label_update", message, "col-12 h-100 alert alert-danger text-center");
            });
    }

    function APIUpdateCategory()
    {
        axios.post('/api/category/update', {
            _id: code_delete,
            name: document.getElementById('name').value,
            discription: document.getElementById('discription').value,
        })
            .then(function (response) {
                console.log(response);
                APIGetCategory();
                show_result("label_update", response.data.message, "col-12 h-100 alert alert-success text-center");
            })
            .catch(function (error) {
                console.log(error);
                let stringdata = error.response.data.message;
                let message = stringdata[Object.keys(stringdata)[0]][0];
                show_result("label_update", message, "col-12 h-100 alert alert-danger text-center");
            });
    }

    window.onload = function(){
        document.getElementById("main").append(GenerateAlertModal());
        document.getElementById("main").append(GenerateConfirmModal(const_delete_category));

        RegisterEvents();
        APIGetCategory();
    };
</script>
