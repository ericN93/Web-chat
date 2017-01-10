
function createLogin(){
    console.log('create login');
    $('#flash').append(''+
    '<div id="login_window" class="login_form">' +
        '<h1>Login on Chatbate</h1>' +
        '<p id="login-message">' +
            'Logga in på ChatBate för att snacka om Webbutveckling med dina vänner eller möt ny vänner!' +
        '</p>' +
        '<form>' +
            '<ul>' +
                '<li>' +
                    '<input id="userfield" type="text" placeholder="Username" />' +
                '</li>' +
                '<li>' +
                    '<input id="password" type="password" placeholder="Password" />' +
                '</li>' +
                '<li>' +
                    '<input id="loginbutton" type="button" value="Login" class="button" />' +
                    '<input id="registerbutton" type="button" value="Register" class="button" />' +
                '</li>' +
            '</ul>' +
        '</form>' +
    '</div>' );

}
function createRegister(){
    $('#flash').append(''+
'<div id="register" class="register_form">' +
    '<h1>Registera</h1>' +
    '<p id="reg-message">' +
        'Registrera dig nu!' +
    '</p>' +
    '<form>' +
        '<ul>' +
            '<li>' +
                '<input id="regUserName" type="text" placeholder="Username" />' +
            '</li>' +
            '<li>' +
                '<input id="regUserPassword" type="password" placeholder="Password" />' +
            '</li>' +
            '</br>' +
            '<li>' +
                '<input id="regSignUp" type="submit" value="Sign Up" class="button" />' +
                '<input id="regBack"type="submit" value="Back" class="button" />' +
            '</li>' +
        '</ul>' +
    '</form>' +
'</div>');
};

function toggleLoginRegister(className){
    $(className).toggle();
}
