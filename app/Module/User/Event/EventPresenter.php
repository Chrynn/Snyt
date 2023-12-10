<?php

declare(strict_types=1);

namespace App\Module\User\Event;

use App\Model\Factory\LoginFactory;
use App\Model\Repository\EventRepository;
use App\Model\Service\AuthorizationService;
use App\Module\User\UserPresenter;
use Nette\Utils\Paginator;

class EventPresenter extends UserPresenter
{
	public function __construct(
        protected EventRepository $eventRepository,
        protected AuthorizationService $authorizationService,
        protected LoginFactory $loginFactory,
    )
	{
		parent::__construct(
            $this->authorizationService,
            $this->loginFactory
        );
	}

	public function actionDefault(int $page = 1): void
	{
		$eventAllCount = $this->eventRepository->getAllCount();

		$paginator = new Paginator();
		$paginator->setItemCount($eventAllCount);
		$paginator->setItemsPerPage(6);
		$paginator->setPage($page);

		$this->template->events = $this->eventRepository->findAllForPaginator($paginator->getLength(), $paginator->getOffset());
		$this->template->paginator = $paginator;
	}
}
