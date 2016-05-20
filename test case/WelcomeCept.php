<?php 
  date_default_timezone_set('America/New_York');
  $I = new AcceptanceTester($scenario);
  $I->wantTo('ensure that frontpage works');
  $I->amOnPage('/');

function test_fbloginlogout($I) 
{
//home
    $I->amOnPage('/index.html');
    $I->wait('3');
//Logging in
    $I->click(['id'=>'FBclickButton']);
    $I->wait('3');
    $I->amOnUrl('https://www.facebook.com/login.php?skip_api_login=1&api_key=1212373392113632&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv2.6%2Fdialog%2Foauth%3Fredirect_uri%3Dhttps%253A%252F%252Fwww.facebook.com%252Fdialog%252Freturn%252Farbiter%253Frelation%253Dopener%2526close%253Dtrue%2523origin%253Dhttp%25253A%25252F%25252Fcpe333.bagjns.in.th%25252Ff215b4bb884addc%26display%3Dpopup%26state%3Dfc1518fa1068b4%26scope%3Dpublic_profile%252Cemail%26response_type%3Dnone%26default_audience%26auth_type%26ref%3DLoginButton%26client_id%3D1212373392113632%26seen_revocable_perms_nux%3Dfalse%26ret%3Dlogin%26logger_id%3D8f2a8373-8744-43c6-bf07-322928d732c6&cancel_url=https%3A%2F%2Fwww.facebook.com%2Fdialog%2Freturn%2Farbiter%3Frelation%3Dopener%26close%3Dtrue%26protocol%3Dhttps%26response%3D%257B%2522error%2522%253A%2522access_denied%2522%252C%2522error_code%2522%253A200%252C%2522error_description%2522%253A%2522Permissions%2Berror%2522%252C%2522error_reason%2522%253A%2522user_denied%2522%252C%2522state%2522%253A%2522fc1518fa1068b4%2522%257D%23origin%3Dhttp%253A%252F%252Fcpe333.bagjns.in.th%252Ff215b4bb884addc&display=popup&locale=th_TH&logger_id=8f2a8373-8744-43c6-bf07-322928d732c6');
    $I->fillField('//*[@id="email"]','pompomm.3400@gmail.com');
    $I->fillField('//*[@id="pass"]','ilovese1234');
    $I->wait('5');
    $I->click('//*[@id="loginbutton"]');
//back to home page
    $I->amOnUrl('http://www.cpe333.bagjns.in.th/movieEiEi/index.html');
    $I->wait('5');
//click TICKET page
    $I->click('TICKET');
    $I->wait('3');
//click HOME page
    $I->click('HOME');
    $I->wait('3');
//Logging out
    $I->click(['id'=>'FBclickButton']);
    $I->wait('5');
}

function test_signup($I)
{
//home
    $I->amOnPage('/index.html');
    $I->wait('3');
//click SIGN UP button
    $I->click('SIGN UP');
    $I->wait('3');
//Try to click submit
    $I->click('//*[@id="SubmitButton"]');
    $I->wait('3');
//Fill user infomation
    //First Name
    $I->fillField('eg.Peach','Johnson');
    //Last Name
    $I->fillField('eg.sasa','Jaja');
    //Username
    $I->fillField('Username','JJohnson');
    //Email
    $I->fillField('mymail@mail.com','JohnsonJaja@gmail.com');
    //Password
    $I->fillField('//*[@id="password"]','J1111');
    //Confirm Password
    $I->fillField('//*[@id="password_confirm"]','J1111');
    $I->wait('5');
    //click submit
    $I->click('//*[@id="SubmitButton"]');
    $I->wait('3');
    $I->amOnPage('/index.html');
    $I->wait('3');
}

function test_login($I)
{
//home
    $I->amOnPage('/index.html');
    $I->wait('3');
//click LOG IN button
    $I->click('LOG IN');
    $I->wait('3');
    $I->amOnPage('/loginEmail.html');
    //Fill Username
    $I->fillField('Username','JJohnson');
    //Fill Password
    $I->fillField('Password','J1111');
    $I->wait('5');
    //click submit button
    $I->click(['id'=>'Submittt']);
    $I->wait('3');
    $I->amOnPage('/index.html');
    $I->wait('5');
}

function test_click($I)
{
//home
    $I->amOnPage('/index.html');
    $I->wait('3');
//click movie
    $I->click('/html/body/div[4]/div/ul/li[1]/div/div[1]/a/img');
    $I->wait('5');
//back to home
    $I->amOnPage('/index.html');
    $I->wait('3');
//click CATEGORIES page
    $I->click('CATEGORIES');
    $I->wait('3');
    //search for 'harry'
    $I->fillField('//*[@id="site-content"]/header/div[3]/form/input[1]','harry potter');
    $I->wait('3');
    $I->click('//*[@id="site-content"]/header/div[3]/form/input[2]');
    //click Harry Potter 1
    $I->click('/html/body/div[4]/div/ul/li[1]/div/div[1]/a/img');
    $I->wait('3');
//back to home
    $I->amOnPage('/index.html');
    $I->wait('3');
//click TICKET page
    $I->click('TICKET');
    $I->wait('5');   
    //click movie theater
    $I->click('//*[@id="site-content"]/header/div[3]/a[1]/img');
    $I->wait('3');    
//back to home
    $I->amOnPage('/index.html');
    $I->wait('3');    
//click THEATER page
    $I->click('THEATER');
    $I->wait('5'); 
//back to home
    $I->amOnPage('/index.html');
    $I->wait('5');
}

////////////////In test, you must select to run one function in each time////////////////
test_fbloginlogout($I);
//test_signup($I);
//test_login($I);
//test_click($I);

