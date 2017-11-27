<?php
/**
 * created by: Nikolay Tuzov
 */

/** @var array $messages */
/** @var array $users */
?>

<div class="container" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div class="row">
        <div class="col-lg-3">
            <div class="btn-panel btn-panel-conversation">
                <a href="" class="btn  col-lg-6 send-message-btn " role="button"><i class="fa fa-search"></i> Search</a>
                <a href="" class="btn  col-lg-6  send-message-btn pull-right" role="button"><i class="fa fa-plus"></i>
                    New Message</a>
            </div>
        </div>

        <div class="col-lg-offset-1 col-lg-7">
            <div class="btn-panel btn-panel-msg">

                <a href="" class="btn  col-lg-3  send-message-btn pull-right" role="button"><i class="fa fa-gears"></i>
                    Settings</a>
            </div>
        </div>
    </div>
    <div class="row" id="chat-main">
        <?php require_once("partial/_contacts.php"); ?>
        <div class="message-wrap col-lg-8">
            <div class="msg-wrap" v-cloak>
                <div v-for="message in messages">
                    <chat-message
                            :name="message.name"
                            :text="message.text"
                            image="/img/av1.jpg"
                            time="23:15"></chat-message>
                </div>
            </div>

            <div class="send-wrap ">
                <textarea v-model="message" v-on:keydown.enter.prevent.stop="send($event)" class="form-control send-message" rows="3"
                          placeholder="Write sa reply..."></textarea>
            </div>
            <div class="btn-panel">
                <a href="" class=" col-lg-3 btn send-message-btn" role="button"><i class="fa fa-cloud-upload"></i>
                    Add Files</a>
                <button v-on:click="send" class="col-lg-4 text-right btn send-message-btn pull-right">
                    <i class="fa fa-plus"></i> Send Message
                </button>
                <button v-on:click="update" class="col-lg-4 text-right btn send-message-btn pull-right">
                    <i class="glyphicon glyphicon-sunglasses"></i> Update
                </button>
            </div>
        </div>
    </div>

    <div id="demo" v-cloak>
        <p>{{message2 ? message2 : "no content"}}</p>
        <input v-model="message2">
    </div>
</div>

<script src="/js/chat.js"></script>

