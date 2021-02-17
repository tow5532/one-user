@php
$totalPage = ceil($paginator->total() / $paginator->perPage()) ? :1;
$page = $paginator->currentPage();

$maxPageCount = 10;
$startPageIdx = floor(($page - 1) / $maxPageCount) * $maxPageCount;
$endPageIdx = $startPageIdx + $maxPageCount;

$paginationPath = $paginator->toArray()['path'];

@endphp

					<div class="entry-pagination">
                        <nav aria-label="Page navigation example text-center">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{$paginator->url($startPageIdx)}}" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
								@for($i = $startPageIdx; $i < $totalPage && $i < $endPageIdx; $i++)
                                <li class="page-item {{$page == $i + 1? 'active':''}}"><a class="page-link" href="{{$paginator->url($i+1)}}">{{$i+1}}</a></li>
								@endfor
<!--                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                <li class="page-item">
                                    <a class="page-link" href="{{$paginator->url($endPageIdx + 1 > $totalPage ? $totalPage : $endPageIdx + 1) }}" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>