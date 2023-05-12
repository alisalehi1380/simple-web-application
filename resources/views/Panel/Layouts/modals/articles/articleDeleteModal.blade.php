<!-- Modal -->
<div class="modal fade" id="article_delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #dc35451a">
                <h5 class="modal-title" id="staticModal" style="color: #dc3545;">هشدار !</h5>
                {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--                        <span aria-hidden="true">&times;</span>--}}
                {{--                    </button>--}}
            </div>
            <div class="modal-body">
                مطمئنی که میخوای مقاله رو حذف کنی؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بیخیال</button>
                <form class="d-inline" action="{{ route('userPanel.article.softDelete' , $article->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#article_delete" id="ali">حذف کن</button>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="/articles/{{ $article->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger delete-article-btn" data-article-id="{{ $article->id }}">Delete</button>
</form>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this article?
                <form id="deleteArticleForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="article_id" id="deleteArticleId" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.delete-article-btn').click(function() {
            let articleId = $(this).data('article-id');
            $('#deleteArticleId').val(articleId);
            $('#deleteModal').modal('show');
        });

        $('#confirmDeleteBtn').click(function() {
            $('#deleteArticleForm').submit();
        });
    });
</script>
