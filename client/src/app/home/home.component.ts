import { Component, OnInit } from '@angular/core';
import { Repuesto } from '../shared/repuesto';
import { RepuestoService } from '../core/repuesto.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  repuestos: Repuesto[] = [];
  constructor(private repuestoService: RepuestoService) {}

  ngOnInit() {
    this.repuestoService
      .getRepuestos()
      .subscribe((data: Repuesto[]) => {
        this.repuestos = data
      });
  }
  
}
