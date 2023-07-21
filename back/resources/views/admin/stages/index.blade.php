@extends('admin.layouts.layout')
@section('content')
    <div class="flex flex-col">
        <ul class="stage-list">
            @foreach($stages as $stage)
                <li class="stage-item">
                    <div class="flex flex-col m-2 bg-gray-100 shadow-md">
                        <div class="m-3">
                            <div class="flex justify-between">
                                <h1 class="font-bold text-2xl">{{$stage->name}}</h1>
                                <a href="{{route('cp.stages.edit', $stage)}}">
                                    <img src="{{asset('cp/images/edit-pen.svg')}}" alt="edit">
                                </a>
                            </div>
                            <div>
                                <span>Статус по времени: </span>
                                <span
                                    class="@if($stage->stage_status->status_name == 'Доступно') text-green-600 @else text-red-600 @endif">
                                    {{$stage->stage_status->status_name}}
                                </span>
                            </div>
                            <div>
                                <span>Статус по активности:
                                    @if($stage->activity)
                                        Доступно
                                    @else
                                        Недоступно
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span>Описание этапа: {{$stage->desc}}</span>
                            </div>
                            <div class="container mt-4">
                                <button type="button" class="trigger">Инструкция</button>
                                <div class="content">
                                    {{$stage->instruction}}
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <span>{{\Carbon\Carbon::parse($stage->date_start)->translatedFormat("F j, H:i")}} - {{\Carbon\Carbon::parse($stage->date_end)->translatedFormat("F j, H:i")}} (по Томску)</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@push('scripts')
    <script>
        let containers;

        function initDrawers() {
            // Get the containing elements
            containers = document.querySelectorAll(".container");
            setHeights();
            wireUpTriggers();
            window.addEventListener("resize", setHeights);
        }

        window.addEventListener("load", initDrawers);

        function setHeights() {
            containers.forEach(container => {
                // Get content
                let content = container.querySelector(".content");
                // Needed if this is being fired after a resize
                content.removeAttribute("aria-hidden");
                // Height of content to show/hide
                let heightOfContent = content.getBoundingClientRect().height;
                // Set a CSS custom property with the height of content
                container.style.setProperty("--containerHeight", `${heightOfContent}px`);
                // Once height is read and set
                setTimeout(e => {
                    container.classList.add("height-is-set");
                    content.setAttribute("aria-hidden", "true");
                }, 0);
            });
        }

        function wireUpTriggers() {
            containers.forEach(container => {
                // Get each trigger element
                let btn = container.querySelector(".trigger");
                // Get content
                let content = container.querySelector(".content");
                btn.addEventListener("click", () => {
                    container.setAttribute(
                        "data-drawer-showing",
                        container.getAttribute("data-drawer-showing") === "true" ? "false" : "true"
                    );
                    content.setAttribute(
                        "aria-hidden",
                        content.getAttribute("aria-hidden") === "true" ? "false" : "true"
                    );
                });
            });
        }
    </script>
@endpush

