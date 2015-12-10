<?php

//mail('asa--87@mail.ru','Register Confirm', "sdfgdfgfd"); 

include_once './class/Access.class.php';
include_once './class/DataBase.class.php';
include_once './class/Lang.class.php';
include_once './class/Valid.class.php';

$objDB = new DataBase;
$objAccess = new Access($objDB);
$objLang = new Lang;
$objValid = new Valid($objDB);

switch (filter_input(INPUT_POST, 'action')){
  case 'reg':
    if ($objValid->valid){
      $objDB->addUser($objValid->request);
      include_once 'index.php';
      exit;
    }
    break;
  default:
    $objValid->clear();
    break;
}

$accessType = $objAccess->accessType;
$page = $objAccess->page;
$text = $objLang->text;
$errors = $objValid->errorText($text);
$fields = $objValid->request;
include_once 'html_header.php';

?>

<section class="row">

  <!-- Левый столбец -->
  <div class="col-sm-4 col-xs-12">
    <img src="./img/taxi-ii-2000-18-g.jpg" alt="taxi" class="img-thumbnail">
  </div>

  <!-- Правый столбец -->
  <div class="col-sm-8 col-xs-12">
    <div class="jumbotron">
      <h2 class="text-primary"><?=$text['Registration'];?></h2>
      <p><?=$text['RegNotice'];?></p>
      <hr>
      <form role="form" method="POST">

        <div class="form-group">
          <label class="control-label" for="surname"><?=$text['Surname'];?></label>
          <div class="input-group">
            <input id="surname" class="form-control" name="surname" 
                   value="<?=$fields['surname'];?>" type="text">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" 
                      data-toggle="tooltip" title="<?=$text['SurnameHelp'];?>">?
              </button>
            </span>
          </div>
          <span class="help-block"><?=$errors['surname'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="name"><?=$text['Name'];?></label>
          <div class="input-group">
            <input id="name" class="form-control" name="name" 
                   value="<?=$fields['name'];?>" type="text">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" 
                      data-toggle="tooltip" title="<?=$text['NameHelp'];?>">?
              </button>
            </span>
          </div>
          <span class="help-block"><?=$errors['name'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="patronymic"><?=$text['Patronymic'];?></label>
          <div class="input-group">
            <input id="patronymic" class="form-control" name="patronymic" 
                   value="<?=$fields['patronymic'];?>" type="text">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" 
                      data-toggle="tooltip" title="<?=$text['PatronymicHelp'];?>">?
              </button>
            </span>
          </div>
          <span class="help-block"><?=$errors['patronymic'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="email"><?=$text['Email'];?> *</label>
          <input id="email" class="form-control" name="email" 
                 value="<?=$fields['email'];?>" type="text">
          <span class="help-block"><?=$errors['email'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="phone"><?=$text['Phone'];?></label>
          <div class="input-group">
            <input id="phone" class="form-control" name="phone" 
                   value="<?=$fields['phone'];?>" type="text">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" 
                      data-toggle="tooltip" title="<?=$text['PhoneHelp'];?>">?
              </button>
            </span>
          </div>
          <span class="help-block"><?=$errors['phone'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="login"><?=$text['Login'];?> *</label>
          <div class="input-group">
            <input id="login" class="form-control" name="login" 
                   value="<?=$fields['login'];?>" type="text">
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" 
                      data-toggle="tooltip" title="<?=$text['LoginHelp'];?>">?
              </button>
            </span>
          </div>
          <span class="help-block"><?=$errors['login'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="passw"><?=$text['Password'];?> *</label>
          <div class="input-group">
            <input id="passw" class="form-control" name="passw" 
                   value="<?=$fields['passw'];?>" type="password">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" 
                      data-toggle="tooltip" title="<?=$text['PasswordHelp'];?>">?
              </button>
            </span>
          </div>
          <span class="help-block"><?=$errors['passw'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="confirm"><?=$text['Confirm'];?> *</label>
          <input id="confirm" class="form-control" name="confirm" 
                 value="<?=$fields['confirm'];?>" type="password">
          <span class="help-block"><?=$errors['confirm'];?></span>
        </div>
        
        <div class="form-group">
          <label class="control-label" for="comment"><?=$text['Comment'];?></label>
          <textarea id="comment" class="form-control" name="comment" 
                    value="<?=$fields['comment'];?>" rows="4" maxlength="255">
          </textarea>
        </div>
        
        <button class="btn btn-primary btn-lg" name="action" value="reg" type="submit">
          <?=$text['Registration'];?> <span class="glyphicon glyphicon-play"></span>
        </button>
        
      </form>
    </div>
  </div>
  
</section>

<SCRIPT>
  $('button[data-toggle="tooltip"]').tooltip();
  $('span.help-block:not(:empty)').parent('div.form-group').addClass('has-error');
</SCRIPT>
        
<?php
include_once 'html_footer.php';