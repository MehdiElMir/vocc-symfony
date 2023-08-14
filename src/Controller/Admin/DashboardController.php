<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\Module;
use App\Entity\Formation;
use App\Entity\Inscription;
use App\Entity\NewsLetter;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Vocc - Administration')
            ->setFaviconPath('asset/img/apropos_checkmark_logo.png')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Content');
        yield MenuItem::linkToCrud('Formations', 'fas fa-graduation-cap', Formation::class);
        yield MenuItem::linkToCrud('Modules', 'fa-solid fa-book', Module::class);
        yield MenuItem::section('Communication');
        yield MenuItem::linkToCrud('Contact', 'fa-solid fa-address-book', Contact::class);
        yield MenuItem::linkToCrud('Inscriptions', 'fa-solid fa-arrow-down-long', Inscription::class);
        yield MenuItem::linkToCrud('emails for NewsLetters', 'fa-solid fa-newspaper', NewsLetter::class);
        yield MenuItem::section('Personnels');
        yield MenuItem::linkToCrud('show users', 'fa-solid fa-user', User::class)->setPermission('ROLE_ADMIN');
    }
}
