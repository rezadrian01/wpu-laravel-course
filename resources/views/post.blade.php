<x-layout :title="$title">
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased mb-10">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a class="text-blue-500 decoration-0 underline-offset-2 hover:underline" href="/posts">&laquo; Back to All Posts</a>
                <header class="my-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                 src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a rel="author" class="text-xl font-bold text-gray-900 dark:text-white"
                                   href="/posts?author={{ $post->author->username }}">{{ $post->author->name }} </a>
                                <a class="text-gray-800 block w-fit my-1 {{$post->category->color}} hover:underline"
                                   href="/posts?category={{ $post->category->slug }}">
                                    <span
                                        class="text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                      {{ $post->category->name }}
                                    </span>
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{$post->created_at->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post['title'] }}</h1>
                </header>
                <p>{{$post['body'] }}</p>
            </article>
        </div>
    </main>
</x-layout>
