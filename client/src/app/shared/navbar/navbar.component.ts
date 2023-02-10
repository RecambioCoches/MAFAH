import { Component, OnInit } from '@angular/core';
import { RepuestoService } from '../../core/repuesto.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css'],
})
export class NavbarComponent implements OnInit {
  id: any;

  constructor(private repuestoService: RepuestoService, private router: Router) {}

  ngOnInit() {}

  newRepuesto() {
    // Get max repuesto Id from the repuesto list
    this.repuestoService.getMaxRepuestoId().subscribe((data) => (this.id = data));
    this.router.navigate(['/repuestos', this.id+1, 'new']);
  }
}
