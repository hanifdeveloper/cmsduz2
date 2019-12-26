<!-- Comments -->
<h5 class="title_section"><?= $commentNews['count']; ?> Comments</h5>
<?php //$this->debugResponse($commentNews); ?>
<ol class="comments_list" id="comments">
<?php foreach ($commentNews['list'] as $key => $value): ?>
    <li class="comment">
        <article>
            <div class="comment_avatar">
                <img src="<?= $this->templatePath; ?>/demo/avatar-images/1.jpg" alt="Avatar">
            </div>
            <div class="comment_content">
                <div class="meta">
                    <span class="comment_author"><a href="#"><?= $value['comment_author']; ?></a></span>
                    <span class="comment_date"><?= $value['comment_date']; ?></span>
                </div>
                <p><?= $value['comment_content']; ?></p>
            </div>
        </article>
    </li>
<?php endforeach; ?>
</ol>
<!-- Respond -->
<h5 class="title_section">Leave a Comment</h5>
<div id="response-message">
    <div id="writecomment" class="writecomment">
        <a href="#" name="respond"></a>
        <div id="respond" class="comment-respond">
            <form action="<?= $this->baseUrl.'/berita/comment'; ?>" method="POST" class="comment-form" autocomplete="off">
                <?= BOOTSTRAP::inputKey('news_id', $commentNews['news_id']); ?>
                <?= BOOTSTRAP::inputKey('news_url', $this->activeUrl.'#response-message'); ?>
                <p>
                    <label>Nickname <span class="required">*</span></label>
                    <?= BOOTSTRAP::inputText('comment_author', 'text', '', 'placeholder="Nickname" required'); ?>
                </p>
                <p>
                    <label>E-mail <span class="required">*</span></label>
                    <?= BOOTSTRAP::inputText('comment_email', 'text', '', 'placeholder="E-mail" required'); ?>
                </p>
                <p>
                    <label>Comment <span>*</span></label>
                    <?= BOOTSTRAP::inputTextArea('comment_content', '', 'placeholder="Your comment.." required'); ?>
                </p>						
                <p class="form-submit">
                    <input name="submit" type="submit" id="submit" class="submit btn btn_black" value="Post a Comment">
                </p>
            </form>
        </div>
    </div>
</div>
<?= $responseMessage; ?>