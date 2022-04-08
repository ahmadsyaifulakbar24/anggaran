function pagination(links, meta, path) {
    let current = meta.current_page
    let replace = path + '?page='

    let first = links.first.replace(replace, '')
    if (first != current) {
        $('#first').removeClass('disabled')
        $('#first').data('id', first)
    } else {
        $('#first').addClass('disabled')
    }

    if (links.prev != null) {
        $('#prev').removeClass('disabled')
        let prev = links.prev.replace(replace, '')
        $('#prev').data('id', prev)

        $('#prevCurrent').show()
        $('#prevCurrent span').html(prev)
        $('#prevCurrent').data('id', prev)

        let prevCurrentDouble = prev - 1
        if (prevCurrentDouble > 0) {
            $('#prevCurrentDouble').show()
            $('#prevCurrentDouble span').html(prevCurrentDouble)
            $('#prevCurrentDouble').data('id', prevCurrentDouble)
        } else {
            $('#prevCurrentDouble').hide()
        }
    } else {
        $('#prev').addClass('disabled')
        $('#prevCurrent').hide()
        $('#prevCurrentDouble').hide()
    }

    $('#current').addClass('active')
    $('#current span').html(current)

    if (links.next != null) {
        $('#next').removeClass('disabled')
        let next = links.next.replace(replace, '')
        $('#next').data('id', next)

        $('#nextCurrent').show()
        $('#nextCurrent span').html(next)
        $('#nextCurrent').data('id', next)

        let nextCurrentDouble = ++next
        if (nextCurrentDouble <= meta.last_page) {
            $('#nextCurrentDouble').show()
            $('#nextCurrentDouble span').html(nextCurrentDouble)
            $('#nextCurrentDouble').data('id', nextCurrentDouble)
        } else {
            $('#nextCurrentDouble').hide()
        }
    } else {
        $('#next').addClass('disabled')
        $('#nextCurrent').hide()
        $('#nextCurrentDouble').hide()
    }

    let last = links.last.replace(replace, '')
    if (last != current) {
        $('#last').removeClass('disabled')
        $('#last').data('id', last)
    } else {
        $('#last').addClass('disabled')
    }

    $('#pagination').removeClass('hide')
    $('#pagination-label').html(`Showing ${meta.from} to ${meta.to} of ${meta.total} entries`)
}

$('.page').click(function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
        $('#pagination').addClass('hide')
        $('#table-loading').removeClass('hide')
        get_data(page)
    }
})