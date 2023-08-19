<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Expert Billing Options</title>
    <meta name="description" content="Expert options for Billing" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    />
    <link
      rel="stylesheet"
      href="<?= base_url('public/style/style_header.css') ?>"
    />
  </head>
  <body>
    <nav class="sidebar">
      <div class="sidebar-top">
        <span class="shrink-btn"><i class="bx bx-chevron-left"></i></span>
        <img src="./img/logo.png" class="logo" alt="" />
        <h3 class="hide">ExpertBill</h3>
      </div>

      <div class="sidebar-links">
        <ul>
          <li class="tooltip-element" data-tooltip="0">
            <a href="#" class="active">
              <div class="icon">
                <i class="bx bx-tachometer"></i>
                <i class="bx bxs-tachometer"></i>
              </div>
              <span class="link hide">Dashboard</span>
            </a>
          </li>
          <div class="tooltip">
            <span class="show">Dashboard</span>
          </div>
        </ul>
        <hr />
        <? if (str_contains($role, 'ACCOUNTANT')) { ?>
                <h4 class="hide">Accountant</h4>
                <ul>
                  <li class="tooltip-element" data-tooltip="0">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-notepad"></i>
                        <i class="bx bxs-notepad"></i>
                      </div>
                      <span class="link hide">Billing</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="1">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-notepad"></i>
                        <i class="bx bxs-notepad"></i>
                      </div>
                      <span class="link hide">Billing History</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="2">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-notepad"></i>
                        <i class="bx bxs-notepad"></i>
                      </div>
                      <span class="link hide">Quotation</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="3">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-notepad"></i>
                        <i class="bx bxs-notepad"></i>
                      </div>
                      <span class="link hide">Quotation History</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="4">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-cog"></i>
                        <i class="bx bxs-cog"></i>
                      </div>
                      <span class="link hide">Invoices</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="5">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-cog"></i>
                        <i class="bx bxs-cog"></i>
                      </div>
                      <span class="link hide">Invoices History</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="6">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-notepad"></i>
                        <i class="bx bxs-notepad"></i>
                      </div>
                      <span class="link hide">Expense</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="7">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-notepad"></i>
                        <i class="bx bxs-notepad"></i>
                      </div>
                      <span class="link hide">Expense History</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="8">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-cog"></i>
                        <i class="bx bxs-cog"></i>
                      </div>
                      <span class="link hide">Inventory</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="9">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-cog"></i>
                        <i class="bx bxs-cog"></i>
                      </div>
                      <span class="link hide">Customer Details</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="10">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-cog"></i>
                        <i class="bx bxs-cog"></i>
                      </div>
                      <span class="link hide">Supplier Details</span>
                    </a>
                  </li>
                  <li class="tooltip-element" data-tooltip="11">
                    <a href="#">
                      <div class="icon">
                        <i class="bx bx-cog"></i>
                        <i class="bx bxs-cog"></i>
                      </div>
                      <span class="link hide">Accounts</span>
                    </a>
                  </li>

                  <div class="tooltip">
                    <span class="show">Billing</span>
                    <span>Billing History</span>
                    <span>Quotation</span>
                    <span>Quotation History</span>
                    <span>Invoices</span>
                    <span>Invoices History</span>
                    <span>Expense</span>
                    <span>Expense History</span>
                    <span>Inventory</span>
                    <span>Customer Details</span>
                    <span>Supplier Details</span>
                    <span>Accounts</span>
                  </div>
                </ul>
        <? } ?>
        <? if (str_contains($role, 'SALES')) { ?>
            <h4 class="hide">sales</h4>
            <ul>
              <li class="tooltip-element" data-tooltip="0">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Billing</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="1">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Billing History</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="2">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Quotation</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="3">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Quotation History</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="4">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-cog"></i>
                    <i class="bx bxs-cog"></i>
                  </div>
                  <span class="link hide">Invoices</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="5">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-cog"></i>
                    <i class="bx bxs-cog"></i>
                  </div>
                  <span class="link hide">Invoices History</span>
                </a>
              </li>

              <div class="tooltip">
                <span class="show">Billing</span>
                <span>Billing History</span>
                <span>Quotation</span>
                <span>Quotation History</span>
                <span>Invoices</span>
                <span>Invoices History</span>
              </div>
            </ul>
        <? } ?>
        <? if (str_contains($role, 'ANALYST')) { ?>
            <h4 class="hide">Analyst</h4>
            <ul>
              <li class="tooltip-element" data-tooltip="0">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Predictive Analytics</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="1">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Optimization</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="2">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Demand Forecasting</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="3">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Employee Management</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="4">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-cog"></i>
                    <i class="bx bxs-cog"></i>
                  </div>
                  <span class="link hide">Sentiment Analysis</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="5">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-cog"></i>
                    <i class="bx bxs-cog"></i>
                  </div>
                  <span class="link hide">Risk Assessment</span>
                </a>
              </li>
              <div class="tooltip">
                <span>Predictive Analytics</span>
                <span>Demand Forecasting</span>
                <span>Employee Management</span>
                <span>Sentiment Analysis</span>
                <span>Risk Assessment</span>
              </div>
            </ul>
        <? } ?>
        <? if (str_contains($role, 'HR')) { ?>
            <h4 class="hide">Human Resources</h4>
            <ul>
              <li class="tooltip-element" data-tooltip="0">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Manage Employee</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="1">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Add Employee</span>
                </a>
              </li>
              <div class="tooltip">
                <span class="show">Manage Employee</span>
                <span>Add Employee</span>
              </div>
            </ul>
        <? } ?>
        <? if (str_contains($role, 'SUPERVISOR')) { ?>
            <h4 class="hide">Supervisor</h4>
            <ul>
              <li class="tooltip-element" data-tooltip="0">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Manifacture Parts</span>
                </a>
              </li>
              <li class="tooltip-element" data-tooltip="1">
                <a href="#">
                  <div class="icon">
                    <i class="bx bx-notepad"></i>
                    <i class="bx bxs-notepad"></i>
                  </div>
                  <span class="link hide">Inventory</span>
                </a>
              </li>
              <div class="tooltip">
                <span class="show">Manifacture Parts</span>
                <span>Inventory</span>
              </div>
            </ul>
          </div>
      <? } ?>
      <div class="sidebar-footer">
        <a href="#" class="account tooltip-element" data-tooltip="0"
          ><i class="bx bx-user"></i
        ></a>

        <div class="admin-user tooltip-element" data-tooltip="1">
          <div class="admin-profile hide">
            <div class="admin-info">
              <h3><?= $profile->username ?></h3>
              <h5><?= $role ?></h5>
            </div>
          </div>
          <a href="#" class="settings"><i class="bx bx-cog"></i></a>
          <a href="#" class="log-out"><i class="bx bx-log-out"></i></a>
        </div>
      </div>
    </nav>
    <main>
      <div class="path-header"><?= $title ?></div>
    </main>

