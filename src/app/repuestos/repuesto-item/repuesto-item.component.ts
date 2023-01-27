import { Component, Input } from '@angular/core';
import { Repuesto } from '../../shared/repuesto';

@Component({
  selector: 'app-repuesto-item',
  templateUrl: './repuesto-item.component.html',
  styleUrls: ['./repuesto-item.component.css'],
})
export class RepuestoItemComponent {
  @Input() repuesto: Repuesto = {
    id: 0,
    title: '',
    price: 0,
    shortDescription: '',
    description: '',
    categories: [''],
    image: '',
  };
}
