<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/modal.css">
</head>
<body>
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User <i class="fa fa-user-circle-o" aria-hidden="true"></i></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="addforms" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="items item1 boxinput">
                <span><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <label class="formTitle" for="recipient-name">Full Name</label>
                <div>
                  <input type="text" id="username" name="username" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item2 boxinput">
                <span><i class="fa fa-suitcase" aria-hidden="true"></i>
                <label class="formTitle" for="recipient-name">Occupation</label>
                <div>
                  <input type="occupation" id="occupation" name="occupation" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item3 boxinput">
                <span><i class="fa fa-genderless" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Gender</label>
                <div>
                  <input type="gender"  id="gender" name="gender" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item4 boxinput">
                <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Date Applied</label>
                <div>
                  <input type="date" id="date" name="date" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item5 boxinput">
                <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Email</label>
                <div>
                  <input type="email" id="email" name="email" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item6 boxinput">
                <span><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Date of Birth</label>
                <div>
                  <input type="date" id="birth" name="birth" required="required" autocomplete="off">
                </div>
              </div>
              
              <div class="items item7 boxinput">
                <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Phone</label>
                <div>
                  <input type="phone" id="phone" name="phone" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="10" minLength="10" autocomplete="off">
                </div>
              </div>

              <div class="items item8 boxinput">
                <span><i class="fa fa-address-book" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Address</label>
                <div>
                  <input type="address" id="address" name="address" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item9 boxinput">
                <span><i class="fa fa-building" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">City</label>
                <div>              
                  <input type="city" id="city" name="city" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item10 boxinput">
                <span><i class="fa fa-address-card" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Zip Code</label>
                <div>              
                  <input type="zip" id="zip" name="zip" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="4" minLength="4" autocomplete="off">
                </div>
              </div>

              <div class="items item11 boxinput">
                <span><i class="fa fa-flag" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Citizenship</label>
                <div>
                  <input type="citizenship" id="citizenship" name="citizenship" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item12 boxinput">
                <span><i class="fa fa-book" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Religion</label>
                <div>
                  <input type="religion" id="religion" name="religion" required="required" autocomplete="off">
                </div>
              </div>

              <div class="items item13 boxinput">
                <span><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">SSS ID No</label>
                <div>
                  <input type="sss" id="sss" name="sss" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="13" minLength="8" autocomplete="off">
                </div>
              </div>

              <div class="items item14 boxinput">
                <span><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">UMID No</label>
                <div>
                  <input type="umid" id="umid" name="umid" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="12" minLength="12" autocomplete="off">
                </div>
              </div>

              <div class="items item15 boxinput">
                <span><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">GSIS ID No</label>
                <div>
                  <input type="gsis" id="gsis" name="gsis" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="11" minLength="11" autocomplete="off">
                </div>
              </div>

              <div class="items item16 boxinput">
                <span><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Pag-ibig ID No</label>
                <div>
                  <input type="pagibig" id="pagibig" name="pagibig" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="12" minLength="12" autocomplete="off">
                </div>
              </div>

              <div class="items item17 boxinput">
                <span class="formTitle"><i class="fa fa-picture-o" aria-hidden="true"></i>Photo</span>
                <input type="file" name="photo" id="userphoto" accept="image/*">
              </div>
              
              <div class="items item18 boxinput">
                <span><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text">Philhealth ID No</label>
                <div>
                  <input type="philhealth" id="philhealth" name="philhealth" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="12" minLength="12" autocomplete="off">
                </div>
              </div>

              <div class="items item19 boxinput">
                <span><i class="fa fa-file-text" aria-hidden="true"></i>Document</span>
                <input type="file" name="document" id="userdocument" accept=".pdf*">
              </div>

              <div class="items item20">
                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                <label class="formTitle" for="message-text" >Civil Status</label>
                <div id="bilog">
                  <input type="radio" class="civilstatus" name="civilstatus" value="Married">
                  <label for="civilstatus">Married</label>
                  <input type="radio" class="civilstatus" name="civilstatus" value="Single">
                  <label for="civilstatus">Single</label>
                  <input type="radio" class=" civilstatus" name="civilstatus" value="Divorced">
                  <label for="civilstatus">Divorced</label>
                  <input type="radio" class=" civilstatus" name="civilstatus" value="Seperated">
                  <label for="civilstatus">Seperated</label>
                  <input type="radio" class="civilstatus" name="civilstatus" value="Widowed">
                  <label for="civilstatus">Widowed</label>
                </div>
              </div>

            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="addButton">Submit</button>
              <input type="hidden" name="action" value="adduser">
              <input type="hidden" name="userid" id="userid" value="">
            </div>

          
          </form>
        </div>
      </div>
    </div>
</body>
</html>