import { InMemoryDbService } from 'angular-in-memory-web-api';

export class RepuestoData implements InMemoryDbService {
  createDb() {
    let repuestos = [
      {
        id: 0,
        title: 'Primer repuesto',
        price: 24.99,
        shortDescription: 'This is a short description of the First Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        categories: ['electronics', 'hardware'],
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 1,
        title: 'Segundo repuesto',
        price: 64.99,
        shortDescription: 'This is a short description of the Second Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        categories: ['books'],
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 2,
        title: 'Tercer Repuesto',
        price: 74.99,
        shortDescription: 'This is a short description of the Third Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        categories: ['electronics'],
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 3,
        title: 'Cuarto repuesto',
        price: 84.99,
        shortDescription: 'This is a short description of the Fourth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        categories: ['hardware'],
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 4,
        title: 'Quinto repuesto',
        price: 94.99,
        shortDescription: 'This is a short description of the Fifth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        categories: ['electronics', 'hardware'],
        image: 'https://via.placeholder.com/500x400',
      },
      {
        id: 5,
        title: 'Sexto repuesto',
        price: 54.99,
        shortDescription: 'This is a short description of the Sixth Repuesto',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        categories: ['books'],
        image: 'https://via.placeholder.com/500x400',
      },
    ];
    return { repuestos: repuestos };
  }
}
