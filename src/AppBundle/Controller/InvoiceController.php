<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends Controller
{

    /**
     * @param Request $request
     * @Route(path="/upload-csv", name="uploadCsv")
     * @return Response
     * @throws \Exception
     */
    public function uploadInvoiceCsvAction(Request $request)
    {
        $file = $request->files->get('csvInvoice');
        if (empty($file) || !$this->isValidCsvFile($file)) {
            $this->addFlash('error', 'Please Select a Proper CSV file!!');
            return $this->redirectToRoute('homepage');
        }
        $this->get('app.service.invoice_service')->saveCsvInvoice($file);
        $this->addFlash('success', 'Invoices Added/Updated Successfully!');
        return $this->redirectToRoute('invoiceListing');
    }

    /**
     * @Route(path="/list-invoice", name="invoiceListing")
     * @return Response
     */
    public function listInvoicesAction()
    {
        $invoices = $this->get('app.service.invoice_service')->fetchInvoices();
        return $this->render('default/list.html.twig', [
            'invoices' => $invoices
        ]);
    }

    /**
     * @param File $file
     * @return bool
     */
    private function isValidCsvFile(File $file): bool
    {
        if ($file->getMimeType() != 'text/plain') {
            return false;
        }
        return true;
    }
}
