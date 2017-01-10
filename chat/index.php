<?php $title='ChatBate'; include(__DIR__ . '/incl/header.php'); ?>

<div id='flash'>
    <form id='form1'>
        <div id="chat_window">
            <p>
                <div id="video" class="video"></div>
                <label>Send message: </label></br><textarea rows="7" cols="50" id="message"></textarea>
                <br>
                <input id="send_message" type="button" value="Send" class="button"/>
                <input id="close" type="button" value="Log Out" class="button"/>

            </p>
                <div id="output" class="output"></div>

                <input id="generalOutput" type="button" value="General" class="button"/>
                <input id="whispersOutput" type="button" value="Whispers" class="button"/>
                <input id="allOutput" type="button" value="All" class="button"/>

        </div>
    </form>
</div>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<?php $path=__DIR__; include(__DIR__ . '/incl/footer.php'); ?>
