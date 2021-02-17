@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h6>{{trans('help.faq.sub_title')}}</h6>
                        <h2 class="title-effect">{{trans('help.faq.sub_title')}}</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-30">
                <div class="col-lg-8 col-md-12 no-padding">
                    <h5 class="list_sub_title">{{trans('help.faq.remember')}}</h5>

                    <ul class="list mt-20 sub_list">
                        <li>{{trans('help.faq.sublist.0')}}</li>
                        <li>{{trans('help.faq.sublist.1')}}</li>
                        <li>{{trans('help.faq.sublist.2')}}</li>
                        <li>{{trans('help.faq.sublist.3')}}</li>
                    </ul>
                </div>
            </div>
            <div class="row  justify-content-center mb-30">
                <div class="col-lg-8 col-md-12 no-padding">
                    <img src="/images/sub/faq.jpg" class="mb-20 img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tab nav-center">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="research-tab" data-toggle="tab" href="#research" role="tab" aria-controls="research" aria-selected="true">  Research</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab" aria-controls="design" aria-selected="false"> Design </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="develop-tab" data-toggle="tab" href="#develop" role="tab" aria-controls="develop" aria-selected="false"> Develop </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="result-tab" data-toggle="tab" href="#result" role="tab" aria-controls="result" aria-selected="false">  Result </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="CSS3-tab" data-toggle="tab" href="#CSS3" role="tab" aria-controls="CSS3" aria-selected="false">  CSS3 </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="HTML5-tab" data-toggle="tab" href="#HTML5" role="tab" aria-controls="HTML5" aria-selected="false">  HTML5 </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="jquery-tab" data-toggle="tab" href="#jquery" role="tab" aria-controls="jquery" aria-selected="false">  jquery </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="research" role="tabpanel" aria-labelledby="research-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">01. Tincidunt auctor a ornare odio?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. Consequat auctor eu in elit Class?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. Vitae erat consequat auctor eu in elit?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Morbi accumsan ipsum velit?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="design-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">01. Nam nec tellus a odio tincidunt?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. Nibh vel velit auctor alique?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. Proin gravida nibh vel velit auctor? </a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Amet mauris morbi accumsan ipsum?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="develop" role="tabpanel" aria-labelledby="develop-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">01. Proin gravida nibh vel velit?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. Aenean sollicitudin lorem? </a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. lorem quis bibendum auctor?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Nam nec tellus a odio tincidunt?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="result" role="tabpanel" aria-labelledby="result-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">01. Tincidunt auctor a ornare odio?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. Sed non  mauris vitae erat?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. Nam nec tellus a odio tincidunt auctor?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Proin gravida nibh vel velit auctor?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="CSS3" role="tabpanel" aria-labelledby="CSS3-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">Nam nec tellus a odio tincidunt?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. lorem quis bibendum auctor?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. Enean sollicitudin, lorem quis?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Nec sagittis sem nibh id elit?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="HTML5" role="tabpanel" aria-labelledby="HTML5-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">01. Nam nec tellus a odio tincidunt?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. Proin gravida nibh vel velit auctor?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. Aenean sollicitudin, lorem quis?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Nibh vulputate cursus a sit amet?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="jquery" role="tabpanel" aria-labelledby="jquery-tab">
                                <div class="accordion accordion-border mb-30">
                                    <div class="acd-group acd-active">
                                        <a href="#" class="acd-heading acd-active">01. Mauris vitae erat consequat auctor?</a>
                                        <div class="acd-des" style="">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">02. Vel velit auctor aliquet?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">03. Nam nec tellus a odio tincidunt?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">04. Morbi accumsan ipsum velit?</a>
                                        <div class="acd-des" style="display: none;">
                                            <p>Amet of Lorem Ipsum lorem ipsum dolor sit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat </p>
                                            <ul class="list list-mark mt-20">
                                                <li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum</li>
                                                <li>Auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </li>
                                                <li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
                                                <li>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit Class.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <style>
      .list_sub_title:before {
            font-family: FontAwesome;

            content: "\f00c";
            position: relative;
          padding-right:20px;
        }
        .sub_list{ list-style-position: inside; }
        .sub_list li {padding-left:0px !important;}
      .no-padding{padding:0 !important;}
    </style>

@stop
