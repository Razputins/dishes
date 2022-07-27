$(document).ready(function () {
    $(document).on('click', '.ingredient', function () {
        var ing = [];
        $('.ingredient input:checkbox:checked').each(function (i) {
            ing[i] = $(this).val();
        });
        if (ing.length < 2) {
            $('.ingredient-error').addClass('view').html('Выберите больше ингредиентов');
            $('#dish-list').html('<span class="dish-empty">Ничего не найдено</span>');
            return;
        }
        if (ing.length > 5) {
            $('.ingredient-error').addClass('view').html('Выберите меньше ингредиентов');
            return;
        }
        $('.ingredient-error').removeClass('view');
        $.ajax({
            url: '/dish/with-ingredients',
            method: 'POST',
            data: {ingredients: ing},
            success: function (data) {
                if (data.length > 0) {
                    $('#dish-list').html(data);
                } else {
                    $('#dish-list').html('<span class="dish-empty">Ничего не найдено</span>');
                }
            }
        });
    });
});