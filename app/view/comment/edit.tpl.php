<div id='comment_form'>
    <form method=post>
        <input type=hidden name="redirect" value="<?=$this->url->create('')?>">
        <input type=hidden name="formID" value = "<?=$formID?>">
        <div>
            <input type="text" name="name" id="name" value="<?=$name?>" placeholder="Name">
        </div>
        <div>
            <input type="email" name="mail" id="email" value="<?=$mail?>" placeholder="Email">
        </div>
        <div>
            <input type="url" name="web" id="website" value="<?=$web?>" placeholder="Website URL">
        </div>
        <div>
            <textarea rows="10" name="content" id="comment"><?=$content?></textarea>
        </div>
        <div>
            <input type='submit' name='doUpdate' value='Update'/>
            <input type='submit' name='doRemoveAll' value='Remove' onClick="this.form.action = '<?=$this->url->create('comment/remove-all')?>'"/>
        </div>

        <output><?=$output?></output>
    </form>
</div>
