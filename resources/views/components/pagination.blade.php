<nav class="pagination">
  @if ($paginator->onFirstPage())
  <a class="btn-pagination" disabled>Voltar</a>
  @else
  <a href="{{ $paginator->previousPageUrl() }}" class="btn-pagination">Voltar</a>
  @endif
  <ul class="list-pages">
    @if ($paginator->previousPageUrl())
    <li class="page-item">
      <a href="{{ $paginator->previousPageUrl() }}">{{ $paginator->currentPage() - 1 }}</a>
    </li>
    @endif
    <li class="page-item">
      <a class="active">{{ $paginator->currentPage() }}</a>
    </li>
    @if ($paginator->nextPageUrl())
    <li class="page-item">
      <a href="{{ $paginator->nextPageUrl() }}">{{ $paginator->currentPage() + 1 }}</a>
    </li>
    @endif
  </ul>
  @if ($paginator->hasMorePages())
  <a href="{{ $paginator->nextPageUrl() }}" class="btn-pagination">Próximo</a>
  @else
  <a class="btn-pagination" disabled>Próximo</a>
  @endif
</nav>