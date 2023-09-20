@if (isset($searched))

<div class="col-lg-12">
    <div class="mx-auto d-table">
        <ul class="pagination mt-50">
            <?php    $items=$allRCP->total();

                                        $loopValue=ceil($items/9);

                                        $totalPage=$allRCP->lastPage();

                                        $currentPage = $allRCP->currentPage();

                              ?>
            <li class="page-item">
                <a id="pre-page"  class="{{ 1>=$currentPage?'isDisabled page-link':" page-link "}}">Prev</a>
            </li>

            @for ($i = 1; $i <= $loopValue; $i++) <li class="page-item">
                <li>

                    <a class="page-link active ">
                        <span class="page-length">{{$i}}</span> </a>

                </li>

                @endfor

                <li class="page-item"><a id="next-page"
                        class=" {{ $totalPage <= $currentPage?'isDisabled page-link':" page-link "}}" >Next</a>
                </li>
        </ul>
    </div>
</div>





<!------pagination for first time page load-------->
@else






<div class="col-lg-12">
    <div class="mx-auto d-table">
        <ul class="pagination mt-50">
            <?php
            $items = $allRCP->total();
            $perPage = $allRCP->perPage();
            $totalPage = $allRCP->lastPage();
            $currentPage = $allRCP->currentPage();
            
            $loopValue = min(9, $totalPage); // Maximum 9 page links
            
            // Adjust start and end page numbers for centered display
            $startPage = max($currentPage - floor($loopValue / 2), 1);
            $endPage = $startPage + $loopValue - 1;
            
            if ($endPage > $totalPage) {
                $startPage -= ($endPage - $totalPage);
                $endPage = $totalPage;
                $startPage = max(1, $startPage);
            }
            ?>

            <li class="page-item">
                <a class="{{ $currentPage <= 1 ? 'isDisabled page-link' : 'page-link' }}"
                   href="{{ url(Request()->path() . '?page=' . ($currentPage - 1)) }}">Prev</a>
            </li>

            @if ($startPage > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ url(Request()->path() . '?page=1') }}">1</a>
                </li>
                @if ($startPage > 2)
                    <li class="page-item">
                        <span class="page-dots">...</span>
                    </li>
                @endif
            @endif

            @for ($i = $startPage; $i <= $endPage; $i++)
                <li class="page-item">
                    <a class="page-link {{ $i == $currentPage ? 'active' : '' }}"
                       href="{{ url(Request()->path() . '?page=' . $i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($endPage < $totalPage)
                @if ($endPage < $totalPage - 1)
                    <li class="page-item">
                        <span class="page-dots">...</span>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ url(Request()->path() . '?page=' . $totalPage) }}">{{ $totalPage }}</a>
                </li>
            @endif

            <li class="page-item">
                <a class="{{ $totalPage <= $currentPage ? 'isDisabled page-link' : 'page-link' }}"
                   href="{{ url(Request()->path() . '?page=' . ($currentPage + 1)) }}">Next</a>
            </li>
        </ul>
    </div>
</div>
<script>

</script>

@endif