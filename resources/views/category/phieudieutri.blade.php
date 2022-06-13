@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="card-header text-center">
            <h2>PHIẾU ĐIỀU TRỊ</h2>
        </div>

        <div class="w-100">
            <div class="row">
                <div class="col d-flex justify-content-end align-items-end">
                    <button class="btn btn-primary m-3" id="btn_add">Thêm</button>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <form id="form_category" method="POST" class="w-75 border rounded" hidden>
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
    var data = {
        "_id": "62a547aaf54b00002a005d82",
        "id_emr": "emr_0001",
        "name": "Phiếu cam kết điều trị",
        "index": 1,
        "collection": "emr_0001",
        "description": "Phiếu cam kết điều trị",
        "mrt_url": "mrt/emr_0001-phieucapketdieutri.mrt",
        "json_properties": {
            "id_hs": {
				"required": "required|max:50|unique:emr_list",
				"show": false,
				"description": "Mã hồ sơ",
				"views": {                   
					}
			},
            "id_bn": {
				"required": "required",
				"show": false,
				"description": "Mã bệnh nhân",
				"views": {                   
					}
			},
            "tencoso": {
				"required": "required",
				"show": true,
				"description": "Tên cơ sở",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "1,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "tenbv": {
				"required": "required",
				"show": true,
				"description": "Tên bệnh viện",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "1,2",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "khoa": {
				"required": "required",
				"show": true,
				"description": "Tên khoa",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "2,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "tenphieu": {
				"required": "required",
				"show": true,
				"description": "Tên phiếu",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "3,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "kinhgui": {
				"required": "required",
				"show": true,
				"description": "Kính gửi",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "5,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "soba": {
				"required": "required",
				"show": true,
				"description": "Số bệnh án",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "6,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "hotenbn": {
				"required": "required",
				"show": true,
				"description": "Họ tên bệnh nhân",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "7,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "tuoi": {
				"required": "required",
				"show": true,
				"description": "Tuổi",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "7,2",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "gioitinh": {
				"required": "required",
				"show": true,
				"description": "Giới tính",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "7,3",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "dantoc": {
				"required": "required",
				"show": true,
				"description": "Dân tộc",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "8,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "sodienthoai": {
				"required": "required",
				"show": true,
				"description": "Số điện thoại",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "8,2",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "nghenghiep": {
				"required": "required",
				"show": true,
				"description": "Nghề nghiệp",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "8,3",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "diachi": {
				"required": "required",
				"show": true,
				"description": "Địa chỉ",
				"views": {
					"tags": "text",
					"list_type": "string",
					"search": false,
					"location": "9,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			},
            "ngaythangnam": {
				"required": "",
				"show": true,
				"description": "Ngày tháng năm",
				"views": {
					"tags": "datetime-local",
					"list_type": "string",
					"search": false,
					"location": "10,1",
					"func_update": true,
					"func_del": true,
					"data_select": {                    
					}
				}
			}
        }
    };

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
        var formData = new FormData(document.getElementById('form_category'));

        const formDataObj = Object.fromEntries(formData.entries());
        alert(JSON.stringify(formDataObj));
        // axios.post('/api/category/create', {
        //     name: document.getElementById('name').value,
        //     discription: document.getElementById('discription').value,
        // })
        //     .then(function (response) {
        //         console.log(response);
        //         APIGetCategory();
        //         show_result("label_update", response.data.message, "col-12 h-100 alert alert-success text-center");
        //     })
        //     .catch(function (error) {
        //         console.log(error.response.data);
        //         let stringdata = error.response.data.message;
        //         let message = stringdata[Object.keys(stringdata)[0]][0];
        //         show_result("label_update", message, "col-12 h-100 alert alert-danger text-center");
        //     });
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

        GenerateForm(data, "form_category");
        RegisterEvents();
        APIGetCategory();
    };

    function GenerateForm(data, id_form)
    {
        var elementForm = document.getElementById(id_form);

        var properties = data.hasOwnProperty("json_properties")?data["json_properties"]:null;
        if(properties == null)
        {
            return false;
        }

        for(let element in properties)
        {
            let obj_value =properties[element];
            let view = obj_value["views"];

            if(!obj_value["show"])
            {
                continue;
            }

            let divRow = document.getElementById("row_" + GetLocation(view["location"]));
            if(divRow == null)
            {
                divRow = document.createElement("div");
                divRow.setAttribute("class","row mb-3");
                divRow.setAttribute("id","row_" + GetLocation(view["location"]));
            }

            let divCol = document.createElement("div");
                divCol.setAttribute("class","col-sm");
                divCol.setAttribute("id","col_" + GetLocation(view["location"], "col"));

            let labelTag = document.createElement("label");
                labelTag.innerText = obj_value["description"];

            let inputTag = document.createElement("input");

                inputTag.setAttribute("type",(view["tags"]));
                inputTag.setAttribute("class","form-control");
                inputTag.setAttribute("id",element);
                inputTag.setAttribute("name",element);
                if(obj_value["required"])
                {
                    inputTag.setAttribute("required", true);
                }

                divCol.appendChild(labelTag);
                divCol.appendChild(inputTag);
                divRow.appendChild(divCol);
            
            elementForm.appendChild(divRow);
        }
        
        //Button Submit
        let divSubmit = document.createElement("div");
            divSubmit.setAttribute("class","col-sm-2");

        let inputSubmit = document.createElement("input");
            inputSubmit.setAttribute("id","btn_submit_create");
            inputSubmit.setAttribute("class","form-control btn btn-primary");
            inputSubmit.setAttribute("value","Lưu");
            inputSubmit.addEventListener("click",APICreateCategory);

            divSubmit.appendChild(inputSubmit);
            elementForm.appendChild(divSubmit);
    }

    function GetLocation(location, get = "row")
    {
        if(location == "" || location == null)
        {
            return;
        }

        if(get == "row")
        {
            var row = location.substring(0 , location.indexOf(','));

            return row.trim();
        }
        else
        {
            var col = location.substring(location.indexOf(',') + 1);

            return col.trim();
        }
    }
</script>
